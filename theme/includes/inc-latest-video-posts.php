<section id="latest-posts" class="video-posts">
	<header class="section-title">
		<h3>Latest <b>Video Posts</b></h3>
	</header>
	<article>
		<ul>
			<?php
		$category_id = get_cat_ID('Videos'); // Grabbing the specific ID of the Category Name (not the slug).
    $args = array( 'numberposts' => 2, 'orderby' => 'post_date', 'order' => 'DESC', 'category' => $category_id, );

    $videoslist = get_posts( $args );foreach ($videoslist as $post) :  setup_postdata($post); ?>

    <li>
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="post-thumb">
            <?php the_post_thumbnail('video-large'); ?>
            <h3 class="entry-title"><?php the_title(); ?></h3>
        </a>
			<header class="entry-header">
				<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ', 'after' => '')); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				<div class="entry-meta">
					<?php jg_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<p><?php $excerpt = get_the_excerpt(); echo neat_trim($excerpt, 120); ?><p>
			<footer>
				<p><a href="<?php the_permalink(); ?>" title="View More" rel="bookmark">Continue Reading</a><p>
			</footer>
    </li>

<?php endforeach; ?>
		</ul>

			<hr class="clearer">
		<a href="<?php echo get_option('home'); ?>/videos-list-page/" class="btn">View all video posts</a>
	</article>
</section><!-- #latest-posts -->
