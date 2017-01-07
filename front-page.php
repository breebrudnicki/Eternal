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

			 <?php //wedding countdown section
			 if ( get_theme_mod( 'eternal-wedding-date' ) ) :
				 $dt_countdown_date = esc_attr( get_theme_mod( 'eternal-wedding-date' ) );
				 $date = date( 'F d, Y', strtotime( $dt_countdown_date ));
 				?>
				<div class='section-wrapper countdown-section-wrapper'>
				<section class="countdown">
				<?php if ( get_theme_mod( 'eternal-wedding-title' ) ) : ?>
					<h2 class="countdown-title"><?php echo get_theme_mod( 'eternal-wedding-title' ); ?></h2>
				<?php endif; ?>
				<div>
		      <div class="countdown-container">
		        <div id="clockdiv">
		          <div>
		            <span class="days"></span>
		            <div class="smalltext">Days</div>
		          </div>
		          <div>
		            <span class="hours"></span>
		            <div class="smalltext">Hours</div>
		          </div>
		          <div>
		            <span class="minutes"></span>
		            <div class="smalltext">Minutes</div>
		          </div>
		          <div>
		            <span class="seconds"></span>
		            <div class="smalltext">Seconds</div>
		          </div>
		        </div>
		      </div>
		    </div>
			</section>
		</div>
			 <?php endif; ?>

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

		endif; // if ( 0 !== eternal_panel_count() )

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
