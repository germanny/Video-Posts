<?php
/* =BEGIN: Insert Vimeo video from Custom Field ID
Source: http://wordpress.org/extend/plugins/lux-vimeo-shortcode/
Thanks Eric Rasch, @EricRasch
---------------------------------------------------------------------------------------------------- */
function vimeo_vid($vimeo_meta) {

	$strip_url = explode('/', $vimeo_meta); // take the full string from the Custom Field
	$vimeo_ID = $strip_url[3]; // Strip out all the parts before the Vimeo ID.
	
	$clip_id = $vimeo_ID;
	$width = '640';
	$height = '480';
	$title = '1';
	$byline = '1';
	$portrait	= '1';
	$color = '';
	$html5 = '1';
	
	if (empty($clip_id) || !is_numeric($clip_id)) return '<!-- Vimeo: Invalid Vimeo ID -->';
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	
	echo $html5 ?
	"<iframe src='http://player.vimeo.com/video/$clip_id?title=$title&amp;byline=$byline&amp;portrait=$portrait' width='$width' height='$height' frameborder='0'></iframe>" :
	"<object width='$width' height='$height'><param name='allowfullscreen' value='true' />".
	"<param name='allowscriptaccess' value='always' />".
	"<param name='movie' value='http://vimeo.com/moogaloop.swf?clip_id=$clip_id&amp;server=vimeo.com&amp;show_title=$title&amp;show_byline=$byline&amp;show_portrait=$portrait&amp;color=$color&amp;fullscreen=1' />".
	"<embed src='http://vimeo.com/moogaloop.swf?clip_id=$clip_id&amp;server=vimeo.com&amp;show_title=$title&amp;show_byline=$byline&amp;show_portrait=$portrait&amp;color=$color&amp;fullscreen=1' type='application/x-shockwave-flash' allowfullscreen='true' allowscriptaccess='always' width='$width' height='$height'></embed></object>".
	"<br /><a href='http://vimeo.com/$clip_id'>View on Vimeo</a>.";
}


/* =BEGIN: Get all the Videos
Thanks Eric Rasch, @EricRasch
---------------------------------------------------------------------------------------------------- */
function get_videos($num_videos = 5){
  $category_id = get_cat_ID( VIDEO_CAT ); // Grabbing the specific ID of the Category Name (not the slug).
  $posts = get_posts(array(
  	'posts_per_page'  => $num_videos,
  	'category__in' => $category_id, // the 'category' here needs an ID #, not a slug.
  	'orderby'      => 'post_date',
  	'order'        => 'DESC',
  	)
  );

  echo '<ol class="hfeed posts-lists">';

  foreach($posts as $post){
  	$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), "video-medium");
  ?>
  	<li>
  		<a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" title="<?php echo $post->post_title; ?>">
  			<img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $post->post_title; ?>" class="post-thumb" />
  			<h2><?php echo $post->post_title; ?></h2>
  		</a>
          <div class="entry-content">
                  <?php echo $post->post_excerpt; ?>
              </div> <!-- / . entry-content -->
          </li>
  <?php
  }
  echo '</ol>';
}


/* =BEGIN: Get the Featured Videos
Thanks Eric Rasch, @EricRasch
---------------------------------------------------------------------------------------------------- */
function get_featured_videos(){
	$catidVideos = get_cat_ID( VIDEO_CAT ); // Grabbing the specific ID of the Category Name (not the slug).
	$catidFeatured = get_cat_ID('Featured'); // Grabbing the specific ID of the Category Name (not the slug).
	$posts = get_posts(array(
	'posts_per_page' => 2,
	'category__and' => array($catidVideos, $catidFeatured), // the 'category' here needs an ID #, not a slug.
	'orderby' => 'post_date',
	'order' => 'DESC',
	)
	);
	
	echo '<ol class="hfeed posts-lists featured">';
	
	foreach($posts as $post){
	$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), "video-large");
	?>
	<li><article class="hentry">
	<header class="entry-title">
	<a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" title="<?php echo $post->post_title; ?>">
	<img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $post->post_title; ?>" class="post-thumb" />
	<h2><?php echo $post->post_title; ?></h2>
	</a>
	</header>
	<div class="entry-content">
	<?php echo $post->post_excerpt; ?>
	</div> <!-- / . entry-content -->
	</article></li>
	<?php
	}
	echo '</ol>';
	}

?>