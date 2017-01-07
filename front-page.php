<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eternal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main front-page" role="main">

			<?php
				//TODO ADD COUNTDOWN
			 ?>

		<?php // Show the selected frontpage content

		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
		else : // I'm not sure it's possible to have no posts when this page is shown, but WTH
			get_template_part( 'template-parts/content', 'none' );
		endif;

		?>

		<?php

		// Get each of our panels and show the post data
		$panels = array( '1', '2', '3', '4', '5' );
		$titles = array();

		global $eternalcounter; //Used in content-frontpage.php

		if ( 0 !== eternal_panel_count() ) : //If we have pages to show...

			$eternalcounter = 1;

			foreach ( $panels as $panel ) :

				if ( get_theme_mod( 'eternal_panel' . $panel ) ) :

					$post = get_post( get_theme_mod( 'eternal_panel' . $panel ) );

					setup_postdata( $post );

					set_query_var( 'eternal_panel', $panel );

					get_template_part( 'template-parts/content', 'frontpage' );

					$titles[] = get_the_title(); //Put page titles in an array for use in navigation

					wp_reset_postdata();

				endif; // if ( get_theme_mod( 'eternal_panel' . $panel ) )

				$eternalcounter++;

			endforeach; // foreach ( $panels as $panel )


			/* In-page navigation */

			echo '<ul class="panel-navigation">';
			echo '<li><a class="panel0" href="#page"><span class="sep">&diams;</span><span class="hidden">' . esc_html__( 'Back to Top', 'eternal' ) . '</span></a></li>';

			$counter = 0;

			foreach ( $panels as $panel ) : //Iterate over each panel and grab titles from $titles[] defined in the previous loop

				if ( get_theme_mod( 'eternal_panel' . $panel ) ) : //If the theme mod is set...

					echo '<li><a class="panel' . $panel . '" href="#panel' . $panel . '"><span class="sep">&diams;</span><span class="hidden">' . $titles[$counter] . '</span></a></li>';

					$counter++;

				endif;

			endforeach; // foreach ( $panels as $panel )

			echo '</ul><!-- .panel-navigation -->';

		endif; // if ( 0 !== eternal_panel_count() )

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
