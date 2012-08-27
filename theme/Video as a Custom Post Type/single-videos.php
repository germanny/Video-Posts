<?php
/**
 * The Template for displaying single video posts.
 */
get_header(); ?>

<div id="col-right" class="clearfix">

<div id="breadcrumb" class="clearfix"></div>

<div id="content" class="full clearfix"> 
<div class="top"></div> 
<div class="left video-posts-single"> 
<div class="article"> 

	<header class="page-header">
		<h1 class="page-title">OEDb's College Hacker Series</h1>
	</header><!-- .page-header -->

		<div class="post">

<?php 
global $post;
$vimeo_meta = get_post_meta($post->ID, 'vimeo_value', TRUE);

if ( have_posts() ) while ( have_posts() ) : the_post(); $currentPost = $post->ID; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
			<?php
					vimeo_vid($vimeo_meta);
					// echo '<p class="video-link">view on: <a href="'.$vimeo_meta.'" title="Link to original video on Vimeo">'.$vimeo_meta.'</a></p>';

			?>
				<br class="clearer">
						<?php include('includes/inc-sharebox.php'); ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>

			</div><!-- .post -->

		<?php get_videos_cpt(4); ?>
				<div id="nav-below" class="navigation">
					<div><a href="<?php echo get_option('home')?>/videos/">View All Videos &rarr;</a></div>
				</div><!-- #nav-below -->

</div><!-- END .article --> 
</div> 
 
<div class="bottom"></div> 
</div><!-- END #content --> 
 
</div><!-- END #col-right --> 

<?php get_sidebar(); ?>	
<?php get_footer(); ?>