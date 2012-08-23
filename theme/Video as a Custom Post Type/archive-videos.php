<?php

	if(is_single() && (get_post_type() == 'videos') ) {

		include 'single-videos.php';

	} else {

get_header(); ?>


<div id="col-right" class="clearfix">

<div id="breadcrumb" class="clearfix"></div>

<div id="content" class="full clearfix"> 
<div class="top"></div> 
<div class="left video-posts-archive"> 
<div class="article"> 
    
		<h1>OEDb's College Hacker Series</h1>
			<div class="entry-content">
			
				<?php the_post(); //the_content(); ?>
				<?php getFeaturedVideoCPTs(); ?>
				<?php // getVideos(-1); ?>
				<?php rewind_posts(); ?>

			</div><!-- /.entry-content -->
		
			<ol class="hfeed video-posts-lists">
			<?php while ( have_posts() ) : the_post(); ?>
			
					<li class="post">	
					
						<div class="entry-content">
							<?php jg_post_thumbnail(); ?>
				      <div class="entry-summary">
				  			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				  			<p><?php $excerpt = get_the_excerpt(); echo neat_trim($excerpt, 120); ?><p>
				      </div> <!-- /.entry-summary -->
						</div><!-- /.entry-content -->
			
					</li>
		
					<?php endwhile; // end of the loop. ?>
	     </ol><!-- END .hfeed.video-posts-list -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
        
</div><!-- END .article --> 
</div> 
 
<div class="bottom"></div> 
</div><!-- END #content --> 
 
</div><!-- END #col-right --> 

<?php get_sidebar(); ?>	
<?php get_footer(); } ?>