<?php

/*IMAGES
Add Post Thumbnail Images
***************************************************************************************************************************************/
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 200, 155, true );

// Adding custom thumbnail sizes for the Video Landing Page.
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'video-medium', 330, 9999 ); //400 pixels wide (and unlimited height)
    add_image_size( 'video-large', 620, 9999 ); // Source: http://codex.wordpress.org/Function_Reference/add_image_size#Examples
}

/*VIDEOS
Add Post Videos
***************************************************************************************************************************************/
include_once('functions/fn-videos.php');

/* POST CUSTOM FIELDS UI
********************************************************************************************************************************/
include_once('functions/fn-post-custom-fields.php');

?>
