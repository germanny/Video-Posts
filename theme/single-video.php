<?php
/**
 * The Template for displaying video posts.
 */

get_header(); ?>

		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
			<?php
				if( get_post_meta($post->ID, 'vimeo_value', TRUE) ) {
					$vimeo_meta = get_post_meta($post->ID, 'vimeo_value', TRUE);
					vimeo_vid($vimeo_meta);
					echo '<p class="video-link">view on: <a href="'.$vimeo_meta.'" title="Link to original video on Vimeo">'.$vimeo_meta.'</a></p>';
				}

			?>
						<?php include('includes/inc-sharebox.php'); ?>
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

