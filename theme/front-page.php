<?php
/**
 * Front Page template.
 */
get_header(); ?>

<!-- Main Body -->
<div id="content">

	<?php
		include('includes/inc-latest-video-posts.php');
	?>

</div>

<!-- Sidebar -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>