<?php
/**
 * The template for displaying all single posts.
 *
 * @package wpzaamx
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
					<?php 
						printf( __( 'Filed under %1$s.', 'wpzaamx' ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
					?>
					<?php // wpzaamx_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; ?>

		<?php else : ?>	

			<?php get_template_part( 'template-parts/content', '404' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
