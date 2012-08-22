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


<?php ///////////////////////////////////// OR HERE'S ONE THAT'S PAGED ////////////////////////////////////////// ?>

<?php get_header(); ?>

<div id="content"> 

		<h1>Video Page</h1>
					<div class="entry-content">
							<?php the_content(); // need to put a loop around this somehow, but I didn't work that out yet ?>
							<?php getFeaturedVideos(); ?>
							<?php // getVideos(-1); ?>
		
					</div><!-- /.entry-content -->
		
		<?php // let's query these bitches
		$category_id = get_cat_ID( VIDEO_CAT );
		$args = array (
		
			'orderby' => 'post_date',
			'order' => 'DESC',
			'category_name' => VIDEO_CAT,
			'paged' => get_query_var('paged')
		
		);
		query_posts( $args );
		$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), "thumbnail");
		while ( have_posts() ) : the_post(); ?>
		
				<div class="post">	
				
					<div class="entry-content">
						<?php jg_post_thumbnail(); ?>
			      <div class="entry-summary">
			  			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p><?php $excerpt = get_the_excerpt(); echo neat_trim($excerpt, 120); ?><p>
			      </div> <!-- /.entry-summary -->
					</div><!-- /.entry-content -->
		
				</div>
	
				<?php endwhile; // end of the loop. ?>
        <div class="clearfix page_pagination">
            <span class="nav-next"><?php previous_posts_link('Newer Posts &raquo;'); ?></span>
            <span class="nav-previous"><?php next_posts_link('&laquo; Older Posts'); ?></span>
        </div>
        <?php wp_reset_query(); ?>
	
</div><!-- END #content --> 
 
<?php get_sidebar(); ?>	
<?php get_footer(); ?>