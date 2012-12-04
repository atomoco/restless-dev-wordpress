<?php
/*
Plugin Name: Restless Development "More articles by this author" widget
Description: Displays list of articles by the post author only on post page
Plugin URI: http://www.github.com/forward/xxxxxxxxxx
Author: Restless Development
Version: 0.1
Usage: widget.
*/

// debug
// ini_set ('display_errors', true);

class rd_widget_more_by_author extends WP_Widget {

    function rd_widget_more_by_author() {
        parent::WP_Widget(false, $name = 'More articles by this author');  
    }

    function widget($args, $instance) {
    
      global $post,$authordata;
      
      // only show on a singular post page
      if (!is_singular()) {
        return;
      }

      // find the plugin path and save it for later
      define('RDAWABSPATH', dirname(__FILE__).'/');
      
      // retrieve info
      $title = apply_filters('widget_title', $instance['title']);
      $amount = $instance['amount'];
      $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
      
      // if there are no other posts by this author, don't show anything
      if ( sizeof($authors_posts) < 1 ) {
        return;
      }
      
      // print the widget
   ?> 
   
   
   <aside class="widget">
     <h3 class="widget-title"><?php echo $title ?></h3>
     <div class="more-by-author">
       <ul>
       <?php
       
        foreach ( $authors_posts as $authors_post ) {
          echo '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
        }
       ?>
       
       </ul>
     </div>
    </aside>
   
   
    <?php
    }

    // update the widget settings
    function update($new_instance, $old_instance) {       
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['amount'] = strip_tags($new_instance['amount']);
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
      if (array_key_exists('amount', $instance)){
        $amount = esc_attr($instance['amount']);
      } else {
        $amount=64;
      }
     
      // print admin interface
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('amount'); ?>"><?php _e('Amount:'); ?>
              <select id="<?php echo $this->get_field_id('amount'); ?>" name="<?php echo $this->get_field_name('amount'); ?>" value="<?php echo $amount; ?>" >
             <?php
             for ( $i = 1; $i <= 10; $i+=1 )
              echo "<option value='$i' " . ( $amount == $i ? "selected='selected'" : '' ) . ">$i</option>";
               ?>
              </select></label></p> 
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("rd_widget_more_by_author");'));