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

class rd_widget_about_author extends WP_Widget {

    function rd_widget_about_author() {
        parent::WP_Widget(false, $name = 'About the author');  
    }

    function widget($args, $instance) {
    
      global $post;
      
      function rd_widget_about_author_summary($input,$maxchars=300,$aspace=" ",$suffix='...',$breakword=false,$striptags=true) {
        if ($maxchars<1) {
          $maxchars=300;
        }
        $input = trim($input);
        // remove wordpress caption
        $input = preg_replace("/\[caption.*\[\/caption\]/", '', $input);
        if (strlen($input)>$maxchars) {
          $input = str_replace("\n"," ",$input);
          $input = str_replace("...","~~~",$input);
          $input = str_replace(".",". ",$input);
          $input = str_replace("~~~","...",$input);
          if ($striptags) {
            $temp_array = array('<br>','<br />','</p>','</h1>','</h2>','</h3>','</h4>','</h5>','</li>',);
            $input = str_replace($temp_array,' ',$input);
            $input = strip_tags($input);
          }
          if ($breakword) {
            $output = trim(substr($input,0,$maxchars)).$suffix;
          } else {
            $input = substr(trim($input),0,$maxchars);
            $input = substr($input,0,strlen($input)-strpos(strrev($input),$aspace));
            $output = trim($input).$suffix;
          }
        } else {
          $output = $input;
        }
        return $output;
      }
      
      // only show on a singular post page
      if (!is_singular()) {
        return;
      }

      // find the plugin path and save it for later
      define('RDAWABSPATH', dirname(__FILE__).'/');
      
      // retrieve info
      $title = apply_filters('widget_title', $instance['title']);
      $heading = $instance['heading'];
      $showimage = $instance['showimage'];
      $showname = $instance['showname'];
      $maxchars = intval( $instance['maxchars'] );
      $linktext = $instance['linktext'];
      $author = $post->post_author;
      $name = get_the_author_meta('display_name', $author);
      $firstname = get_the_author_meta('first_name', $author);
      $lastname = get_the_author_meta('last_name', $author);
      $alt_name = get_the_author_meta('user_nicename', $author);
      $description = trim(get_the_author_meta('description', $author));
      if ( $maxchars === '0' ) {
        $description = '';
      } elseif ( is_integer($maxchars) && $maxchars > 0 ) {
        $description = rd_widget_about_author_summary( $description, $maxchars );
      }
      $author_link = get_author_posts_url($author);
      $author_link_text = false;
      if ($linktext) {
        $author_link_text = str_ireplace('[firstname]', $firstname, $linktext);
        $author_link_text = str_ireplace('[lastname]', $lastname, $author_link_text);
        $author_link_text = str_ireplace('[displayname]', $name, $author_link_text);
      }
      
      // if the author has no description, don't show (commented-out, as having "broken" looking  try and force admins to add author bios)
      /*
      if ( strlen(trim($description)) < 10 ) {
        return;
      }
      //*/
      
      // print the widget
   ?> 
   
   <aside class="about-author widget">
     <h3 class="widget-title"><?php echo $title ?></h3>
     <div class="<?php echo ((!defined('DESIGNSWITCH') OR DESIGNSWITCH == 'high') ? 'about-author-with-av' : ''); ?>">
       <?php if ( ( !defined('DESIGNSWITCH') OR DESIGNSWITCH == 'high' ) && $showimage ) { ?>
       <span class="about-author-avatar">
         <a href= "<?php echo $author_link; ?>" >
         <?php
          // try getting an image from the "user photo" plugin first: http://wordpress.org/extend/plugins/user-photo/
    			if(function_exists('userphoto_exists') && userphoto_exists($author)){
    				userphoto_thumbnail($author);
    			} else {
    		    // fall back to gravatar
    			  $avatar = get_avatar($authordata->ID, 64);
    			  // or fall back to blank image
      			if (!$avatar) {
      				$avatar = '<img src="' . RDAWABSPATH . 'images/no-image.gif' . '" width="80" height="80" border="0" alt="no photo">';
      			}
      			echo $avatar;
    			}
  			?>
  			
         </a>
  		 </span>
       <?php } ?>
       
       <?php if ( $showname ) { ?>
       <<?php echo $heading; ?> class="about-author-name"><a href= "<?php echo $author_link; ?>" ><?php echo $name; ?></a></<?php echo $heading; ?>>
       <?php } ?>
       <p class="about-author-summary"><?php echo ( $description ? $description : 'Check back soon for a biography of this author' ); ?> </p>
       <?php if( $author_link_text ) { ?>
        <a href="<?php echo $author_link; ?>" class="about-author-link"><?php echo $author_link_text; ?></a>
       <?php } ?>
       <span class="about-author-clear"></span>
     </div>
   </aside>
   
   
    <?php
    }

    // update the widget settings
    function update($new_instance, $old_instance) {       
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['showimage'] = strip_tags($new_instance['showimage']);
      $instance['showname'] = strip_tags($new_instance['showname']);
      $instance['heading'] = strip_tags($new_instance['heading']);
      $instance['maxchars'] = strip_tags($new_instance['maxchars']);
      $instance['linktext'] = strip_tags($new_instance['linktext']);
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
      $showimage = esc_attr($instance['showimage']);
      $showname = esc_attr($instance['showname']);
      if (array_key_exists('heading', $instance)){
        $heading = esc_attr($instance['heading']);
      } else {
        $heading='h4';
      }
      if (array_key_exists('maxchars', $instance)){
        $maxchars = esc_attr($instance['maxchars']);
      } else {
        $maxchars='200';
      }
      $linktext = esc_attr($instance['linktext']);
     
      // print admin interface
        ?>
        
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
              
            <p><label for="<?php echo $this->get_field_id('showimage'); ?>"><?php _e('Show Author image:'); ?> <input id="<?php echo $this->get_field_id('showimage'); ?>" name="<?php echo $this->get_field_name('showimage'); ?>" type="checkbox" value="1"<?php if ($showimage) {echo ' checked="checked"';} ?> /></label>
            <br />
              <small>
                Will be linked to author page
              </small>
            </p>
              
            <p><label for="<?php echo $this->get_field_id('showname'); ?>"><?php _e('Show Author name in subtitle:'); ?> <input id="<?php echo $this->get_field_id('showname'); ?>" name="<?php echo $this->get_field_name('showname'); ?>" type="checkbox" value="1"<?php if ($showname) {echo ' checked="checked"';} ?> /></label>
            <br />
              <small>
                Will be linked to author page
              </small>
            </p>
            
            <p><label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Author subtitle size:'); ?>
              <select id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" value="<?php echo $heading; ?>" >
             <?php
             for ( $i = 2; $i <= 5; $i+=1 )
              echo "<option value='h$i' " . ( $heading == 'h' . $i ? "selected='selected'" : '' ) . ">Heading size $i</option>";
               ?>
              </select></label></p>
            
            <p><label for="<?php echo $this->get_field_id('maxchars'); ?>"><?php _e('Body max characters:'); ?> <input id="<?php echo $this->get_field_id('maxchars'); ?>" name="<?php echo $this->get_field_name('maxchars'); ?>" type="text" value="<?php echo $maxchars; ?>" size="5" /></label>
            <br />
              <small>
                Leave blank for no limit.
              </small>
            </p>
            
            <p><label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Link text:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" /></label>
            <br />
              <small>
                Example: "Read on..."<br />
                or: "See more articles by [firstname]"<br />
                [displayname] = Author's display name<br />
                [firstname] = Author's first name<br />
                [lastname] = Author's first name<br />
                Leave blank for no link.
              </small>
            </p>
        <?php 
    }
}
add_action('widgets_init', create_function('', 'return register_widget("rd_widget_about_author");'));