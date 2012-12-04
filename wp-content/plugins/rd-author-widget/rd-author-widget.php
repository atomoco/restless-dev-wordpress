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
 ini_set ('display_errors', true);

class rd_author_widget extends WP_Widget {

    function rd_author_widget() {
        parent::WP_Widget(false, $name = 'About the author');  
    }

    function widget($args, $instance) {
    
      global $post;
            
      $title = apply_filters('widget_title', $instance['title']);
      $av_size = $instance['size'];
      
      $author = $post->post_author;
      
      $name = get_the_author_meta('nickname', $author);
      $alt_name = get_the_author_meta('user_nicename', $author);
			if(function_exists('userphoto_exists') && userphoto_exists($authordata)){
				$avatar = userphoto_thumbnail($authordata);
			}
			else {
				$avatar = get_avatar($authordata->ID, 96);	
			}	
      $description = get_the_author_meta('description', $author);
      $author_link = get_author_posts_url($author);
   ?> 
   
   
   <span class="bio-title"><?php echo $title ?></span>
   <div class="author-bio">
     <span class="author-avatar"><?php echo $avatar; ?></span>
     <h5 class="author-name"><a href= "<?php echo $author_link; ?>" ><?php echo $name; ?></a></h5>
     <p class="author-description"><?php echo $description; ?> </p>
   </div>
   
   
    <?php
    }

    function update($new_instance, $old_instance) {       
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['size'] = strip_tags($new_instance['size']);
      return $instance;
    }

    function form($instance) {
      if(array_key_exists('title', $instance)){
        $title = esc_attr($instance['title']);
      }else{$title='';}
      
      if(array_key_exists('size', $instance)){
        $size = esc_attr($instance['size']);
      }else{$size=64;}
     
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
add_action('widgets_init', create_function('', 'return register_widget("rd_author_widget");'));