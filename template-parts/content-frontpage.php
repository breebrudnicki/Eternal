<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eternal
 */

global $eternalcounter;

?>
<div class="article-wrapper panel-wrapper">

		<?php if ( has_post_thumbnail() ) :

			$post_thumbnail_id = get_post_thumbnail_id();

			$thumbnail_attributes = wp_get_attachment_image_src( $post_thumbnail_id, 'eternal-featured' );

			//Calculate aspect ratio: h / w * 100%
			$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100; ?>
			<div class="custom-header in-panel">
				<div class="custom-header-image" style="padding-top: <?php echo esc_attr( $ratio ); ?>%; background-image: url(<?php echo esc_url( $thumbnail_attributes[0] ); ?>);">
				</div>
			</div>
		<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title front-page">', '</h1>' ); ?>
		</header><!-- .entry-header -->


	<?php if ( '' !== get_the_content() ) : ?>
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eternal' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'eternal' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</article><!-- #post-## -->
</div>
