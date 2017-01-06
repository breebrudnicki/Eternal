<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eternal
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<h1 class="footer-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="footer-site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			<?php if ( get_theme_mod( 'eternal-wedding-date' ) ) :
				// $date = get_theme_mod( 'eternal-wedding-date' );
				//
				// function formatDate($date) {
				//     $d = DateTime::createFromFormat('Y-m-d', $date);
				//     return $d && $d->format('d-m-y') === $date;
				// }
				// $formatteddate = formatDate($date);
				$originalDate = get_theme_mod( 'eternal-wedding-date' );
				$newDate = date("d.m.y", strtotime($originalDate));
				?>
			    <p class="wedding-date"><?php echo $newDate; ?></p>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
