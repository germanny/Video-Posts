<?php 
/*
Plugin Name: JG Videos
Plugin URI: 
Description: Post Type for Videos
Version: 1.0
Author: Jen Germann 
Author URI: http://jengermann.com
*/

class videos {
	
	var $meta_fields = array("vimeo_value", "featured");
	
	
	function videos()
	{
		// Register custom post types
		register_post_type('videos', array(
			'label' => __('Videos'),
			'singular_label' => __('Video'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'_builtin' => false, // It's a custom post type, not built in
			'_edit_link' => 'post.php?post=%d',
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array("slug" => "videos"), // Permalinks
			'has_archive' => true,
			'query_var' => "videos", // This goes to the WP_Query schema
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'/*, 'comments' ,'custom-fields'*/), // Let's use custom fields for debugging purposes only
			//'taxonomies' => array('category', 'post_tag')
		));
		
		add_filter("manage_edit-videos_columns", array(&$this, "edit_columns"));
		add_action("manage_posts_custom_column", array(&$this, "custom_columns"));
		
		// Register custom taxonomy
		//register_taxonomy( 'video_types', 'videos', array( 'hierarchical' => true, 'label' => __('Video Type') ) );  
	
		// Admin interface init
		add_action("admin_init", array(&$this, "admin_init"));
		add_action("template_redirect", array(&$this, 'template_redirect'));
		
		// Insert post hook
		add_action("wp_insert_post", array(&$this, "wp_insert_post"), 10, 2);
	}
	
	function edit_columns($columns)
	{
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"featured" => "Featured?",
		);
		
		return $columns;
	}
	
	function custom_columns($column)
	{
		global $post;
		//echo $post->ID;
		$custom = get_post_custom();
		switch ($column)
		{
			case "video_types":
				$video_types = get_the_term_list($post->ID, 'video_types', '', ', ','');  
				echo $video_types;
				break;
			case "featured":
				$featured = get_post_custom();
				echo $custom["featured"][0];
			break;
		}
	}
	
	// Template selection
	function template_redirect()
	{
		global $wp;
		if ($wp->query_vars["post_type"] == "videos")
		{
			include(TEMPLATEPATH . "/archive-videos.php");
			die();
		}
	}
	
	// When a post is inserted or updated
	function wp_insert_post($post_id, $post = null)
	{
		if ($post->post_type == "videos")
		{
			// Loop through the POST data
			foreach ($this->meta_fields as $key)
			{
				$value = @$_POST[$key];
				
				// If value is a string it should be unique
				if (!is_array($value))
				{
					if($value != "")
					{
						// Update meta
						if (!update_post_meta($post_id, $key, $value))
						{
							// Or add the meta data
							add_post_meta($post_id, $key, $value);
						}
					}
				}
				else
				{
					// If passed along is an array, we should remove all previous data
					delete_post_meta($post_id, $key);
					
					// Loop through the array adding new values to the post meta as different entries with the same name
					foreach ($value as $entry)
					{
						if($entry != "")
							add_post_meta($post_id, $key, $entry);
					}
				}
			}
		}
	}
	
	function admin_init() 
	{
		// Custom meta boxes for the edit videos screen
	add_meta_box("video-meta", "Video Options", array(&$this, "meta_options"), "videos", "normal", "low");
	}
	
	// Admin post meta contents
	function meta_options()
	{ //"acc_agency","address","city","state","zip"
		global $post;
		$custom = get_post_custom($post->ID);
		$vimeo_value = $custom["vimeo_value"][0];
		$featured = $custom["featured"][0];
?>
	<script type="text/javascript">
		document.getElementById("post").setAttribute("enctype","multipart/form-data");
		document.getElementById('post').setAttribute('encoding','multipart/form-data');
	</script>

<?php if ( attribute_escape($featured) === "true" ){
				$checked = "checked=\"checked\""; 
			} else {
				$checked = "";
			} 
?>

<table style="width:100%;">
	<tr>
		<td><label><strong>[Vimeo link] paste in your Vimeo URL (the whole URL beginning with http(s)://):</strong></label></td>
	</tr>
	<tr>
		<td><input type="text" name="vimeo_value" value="<?php echo $vimeo_value; ?>" style="width:98%;"></td>
	</tr>
	<tr><td><hr style="border:0;background:transparent;height:1px;border-top: 1px solid #ddd;margin:15px 0 10px;"></td></tr>
	<tr>
		<td><label><strong>Featured?</strong></label></td>
	</tr>
	<tr>
		<td>
			<input name="featured" id="featured" type="checkbox" class="checkbox" value="true" <?php echo $checked; ?> />
		</td>
	</tr>
</table>
<?php
	}
}

// Initiate the plugin
add_action("init", "videosInit");
function videosInit() { global $jgs; $jgs = new videos(); }
?>