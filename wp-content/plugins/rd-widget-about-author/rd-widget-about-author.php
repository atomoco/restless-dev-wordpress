<?php
/*
Plugin Name: Restless Development "About the author" widget
Description: Displays author bio and image only on post page
Plugin URI: http://www.github.com/forward/xxxxxxxxxx
Author: Restless Development
Version: 0.1
Usage: widget.
*/

// debug
// ini_set ('display_errors', true);

class rd_widget_about_author extends WP_Widget {

    function rd_widget_about_author() {
        parent::WP_Widget(false, $name = 'About the author');  
    }

    function widget($args, $instance) {
    
      global $post;
      
      // only show on a singular post page
      if (!is_singular()) {
        return;
      }

      // find the plugin path and save it for later
      define('RDAWABSPATH', dirname(__FILE__).'/');
      
      // retrieve info
      $title = apply_filters('widget_title', $instance['title']);
      $av_size = $instance['size'];
      $author = $post->post_author;
      $name = get_the_author_meta('nickname', $author);
      $alt_name = get_the_author_meta('user_nicename', $author);
      $description = trim(get_the_author_meta('description', $author));
      $author_link = get_author_posts_url($author);
      
      // if the author has no description, don't show (commented-out, as having "broken" looking  try and force admins to add author bios)
      /*
      if ( strlen(trim($description)) < 10 ) {
        return;
      }
      //*/
      
      // print the widget
   ?> 
   
   <aside class="widget">
     <h3 class="widget-title"><?php echo $title ?></h3>
     <div class="about-author">
       <h5 class="about-author-name"><a href= "<?php echo $author_link; ?>" ><?php echo $name; ?></a></h5>
       <span class="about-author-avatar">
         <?php
          // try getting an image from the "user photo" plugin first: http://wordpress.org/extend/plugins/user-photo/
    			if(function_exists('userphoto_exists') && userphoto_exists($author)){
    				userphoto_thumbnail($author);
    			} else {
    		    // fall back to gravatar
    			  $avatar = get_avatar($authordata->ID, 96);
    			  // or fall back to blank image
      			if (!$avatar) {
      				$avatar = '<img src="' . RDAWABSPATH . 'images/no-image.gif' . '" width="' . $av_size . '" height="' . $av_size . '" alt="no photo">';
      			}
      			echo $avatar;
    			}
  			?>
  		 </span>
       <p class="about-author-summary"><?php echo ( $description ? $description : 'Check back soon for a biography of this author' ); ?> </p>
       <span class="about-author-clear"></span>
     </div>
   </aside>
   
   
    <?php
    }

    // update the widget settings
    function update($new_instance, $old_instance) {       
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['size'] = strip_tags($new_instance['size']);
      return $instance;
    }

    // admin interface
    function form($instance) {
    
      // defaults
      if ( array_key_exists('title', $instance) ){
        $title = esc_attr($instance['title']);
      } else {
        $title='';
      }
      if (array_key_exists('size', $instance)){
        $size = esc_attr($instance['size']);
      } else {
        $size=64;
      }
     
      // print admin interface
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Avatar Size:'); ?>
              <select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php echo $size; ?>" >
             <?php
             for ( $i = 16; $i <= 256; $i+=16 )
              echo "<option value='$i' " . ( $size == $i ? "selected='selected'" : '' ) . ">$i</option>";
               ?>
              </select></label></p> 
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("rd_widget_about_author");'));