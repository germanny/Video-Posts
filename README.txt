*--------------------------------------------------------------------*

                       VIDEO POST STARTER KIT

*--------------------------------------------------------------------*

This is just enough files (or parts of files) to get you started
toward a Video Posts section of a WordPress blog.

Thanks to @EricRasch for figuring all this out.


*--------------------------------------------------------------------*

                           FILES INCLUDED
                        TO ADD TO YOUR THEME

*--------------------------------------------------------------------*

plugins
  - video-thumbnails.1.8.1.zip (get the latest at http://wordpress.org/extend/plugins/video-thumbnails/)

theme
  - front-page.php (probably completely unnecessary; might remove)
  - functions
    - fn-post-custom-fields.php (adds the vimeo custom field to the post editor)
    - fn-videos.php (adds functions for establishing the vimeo player and then pulling the video posts from the db)
  - functions.php (adds video thumbnails, includes fn-videos.php and fn-post-custom-fields.php)
  - includes
    - inc-latest-video-posts.php (include to pull two video posts from the db and display in a section on the site)
  - single-video.php (template to display a single video post)
  - video-page.php (template to display the video archives list)
