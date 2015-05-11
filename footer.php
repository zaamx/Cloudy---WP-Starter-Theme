<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpzaamx
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpzaamx' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wpzaamx' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpzaamx' ), 'wpzaamx', '<a href="http://www.zaa.mx" rel="designer">Alonso Avila</a>' ); ?>
			<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
