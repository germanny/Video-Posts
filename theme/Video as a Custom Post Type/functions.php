<?php
/* Deregister jQuery 1.7.1 (WP default) and register jQuery 1.7.2
http://codex.wordpress.org/Function_Reference/wp_enqueue_script
http://wp.tutsplus.com/tutorials/the-ins-and-outs-of-the-enqueue-script-for-wordpress-themes-and-plugins/
http://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/
****************************************************************************************************************************************/
function lets_make_some_scripts() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'http://code.jquery.com/jquery-latest.pack.js');
  wp_enqueue_script( 'jquery' );

  wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/libs/modernizr-2.0.6.min.js'); 
	wp_register_script('myscripts', get_template_directory_uri() . '/js/scripts.js', false, '1.0', true );
	wp_enqueue_script('myscripts');
}    
 
add_action('wp_enqueue_scripts', 'lets_make_some_scripts');


/* Customize the variables here
****************************************************************************************************************************************/
define('DEFAULT_PHOTO', '/images/logo.gif');
define('FB_APP_ID', '459368737414534');

//define('TWITTER_USERNAME', 'USERNAME GOES HERE');
//define('FB_PAGE', 'PAGE NAME GOES HERE'); //full page URL
//define('GOOGLE_PAGE', 'PAGE ID GOES HERE');
//define('TYPEKIT', 'TYPEKIT CODE HERE');

//define('FB_PAGE_ID', '');
//define('FB_ADMINS', '');
//define('LINKEDIN', 'LI USERNAME GOES HERE');
//define('KEYWORDS', '');

if ( function_exists('register_sidebar') )
    register_sidebars(1,array(
       'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    
				function post_snippet($body, $len = 250)
				{
					$body = strip_tags($body);
					$cutoff = strpos($body, ' ', $len);
					if(!$cutoff) $cutoff = $len;
					return substr($body, 0 , $cutoff).'...';
				}
    
/*IMAGES
Add Post Thumbnail Images
***************************************************************************************************************************************/
add_theme_support( 'post-thumbnails', array( 'post', 'videos' ) );
set_post_thumbnail_size( 200, 155, true );

// Adding custom thumbnail sizes for the Video Landing Page.
// Source: http://codex.wordpress.org/Function_Reference/add_image_size#Examples
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'video-medium', 330, 9999 );
    add_image_size( 'video-large', 690, 9999 );
}

/* POST THUMBNAIL
***************************************************************************************************************************************/
include_once('functions/fn-post-thumbnail.php');

/*VIDEOS
Add Post Videos
***************************************************************************************************************************************/
include_once('functions/fn-videos.php');

/* CUSTOM POST TYPE (CPT) - VIDEOS
********************************************************************************************************************************/
include_once('functions/fn-cpt-videos.php');

/* MISC:
NEAT TRIM: Trim length of excerpt to certain # of words
PAGE TITLE: Print the <title> tag based on what is being viewed.
Miscellaneous Theme Support Functions
***************************************************************************************************************************************/
include_once('functions/fn-misc.php');

?>