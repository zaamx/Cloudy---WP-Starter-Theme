<?php
/*
 Template Name: Template de pagina
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"  itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php while ( have_posts() ) : the_post(); ?>

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

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
