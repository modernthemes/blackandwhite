<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package blackandwhite
 */

get_header(); ?>
<div class="grid grid-pad">
	<section id="primary" class="content-area col-9-12">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'blackandwhite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header --> 

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php blackandwhite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- grid -->
  
<?php get_footer(); ?>
