*--------------------------------------------------------------------*

                       VIDEO POST STARTER KIT

*--------------------------------------------------------------------*

This is just enough files (or parts of files) to get you started
toward a Video Posts section of a WordPress blog.

Thanks to @EricRasch for figuring all this out.

There is now a Video Custom Post Type, and files have been reorganized
into directories for that or post category. Pick what you want to go 
with (post category or cpt) and use the files in that respective directory.


*--------------------------------------------------------------------*

                         THINGS TO REMEMBER-
                       VIDEOS AS POST CATEGORY

*--------------------------------------------------------------------*

1) Update the constant variable "VIDEO_CAT" in functions.php with the 
   correct video post category full name.

2) Don't forget to add the extra } after get_footer(); in single.php.

3) The Custom Field value for the Video Thumbnails Options page is 
   vimeo_value.


*--------------------------------------------------------------------*

                         THINGS TO REMEMBER-
                       VIDEOS AS POST CATEGORY

*--------------------------------------------------------------------*

I'm sure something will come up.


*--------------------------------------------------------------------*

                           FILES INCLUDED
                        TO ADD TO YOUR THEME

*--------------------------------------------------------------------*

- plugins
  - video-thumbnails.1.8.1.zip (get the latest at http://wordpress.org/extend/plugins/video-thumbnails/)

- theme
  - Video as a Post Category
    - functions
      - fn-post-custom-fields.php (adds the vimeo custom field to the post editor)
      - fn-videos.php (adds functions for establishing the vimeo player and then pulling the video posts from the db)
    - functions.php (customize VIDEO_CAT value, adds video thumbnails, includes fn-videos.php and fn-post-custom-fields.php)
    - includes
      - inc-latest-video-posts.php (include to pull two video posts from the db and display in a section on the site)
    - single-video.php (template to display a single video post)
    - video-page.php (template to display the video archives list)

  - Video as a Custom Post Type
    - archive-videos.php
    - functions
      - fn-cpt-videos.php (this is the custom post type)
      - fn-videos.php (various functions for displaying videos from the CPT)
    - functions.php
    - single-videos.php






