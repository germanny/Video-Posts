<?php 
/*
Template Name: Videos List Page
*/
?>
<?php get_header(); ?>
		<div id="content" role="main">

				<header class="page-header">
					<h1 class="page-title">Video Archives</h1>
				</header>

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php getFeaturedVideos(); ?>
					<section class="page-content">
						<?php the_content(); ?>
					</section>
					<?php getVideos(); ?>
				<?php endwhile; // end of the loop. ?>
        <div class="clearfix page_pagination">
            <span class="left"><?php previous_posts_link('&laquo; Newer Posts'); ?></span>
            <span class="right"><?php next_posts_link('Older Posts &raquo;'); ?></span>
        </div>
        <?php wp_reset_query(); ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
