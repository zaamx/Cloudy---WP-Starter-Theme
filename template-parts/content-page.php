<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wpzaamx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/BlogPosting">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"  itemprop="headline" rel="bookmark">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpzaamx' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'wpzaamx' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
