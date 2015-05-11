<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpzaamx
 */
?>
		</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="footer-nav">
			<nav role="navigation">
				<?php wp_nav_menu(array(
					'container' => 'div',                           // remove nav container
					'container_class'   => 'collapse navbar-collapse', //ZAAMX clase de contenedor 
					//'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
					'container_id'      => 'menu-secundario',
					'menu' => __( 'Footer Menu', 'wpzaamx' ),  // nav name
					'menu_class' => 'nav navbar-nav',               // adding custom nav class
					'theme_location' => 'footer',                 // where it's located in the theme
					//'before' => '',                                 // before the menu
					//'after' => '',                                  // after the menu
					//'link_before' => '',                            // before each link
					//'link_after' => '',                             // after each link
					'depth' => 2,                                   // limit the depth of the nav
					'fallback_cb' => 'wp_bootstrap_navwalker::fallback', // Modo de respaldo 
					'walker' => new wp_bootstrap_navwalker()
				)); ?>
			</nav>
		</div>
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
