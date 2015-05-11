<?php
/**
 * @package wpzaamx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"  itemprop="headline" rel="bookmark">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php wpzaamx_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content"  itemprop="articleBody">
		<?php the_content(); ?>
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
