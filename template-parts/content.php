<?php
/**
 * @package wpzaamx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title" itemprop="headline" rel="bookmark"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wpzaamx_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content"  itemprop="articleBody">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpzaamx' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="sr-only">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpzaamx' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wpzaamx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->