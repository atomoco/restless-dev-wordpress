<div class='wrap'>

  <div id="icon-plugins" class="icon32"></div>
  <h2>Design switch options</h2>
  
  <p>This plug-in allows the swapping of two different designs, known as "high-bandwidth" (for modern desktop browsers on a good connection) and "low-bandwidth" (for mobile, bad connections and older browsers)</p>
  
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  
    <?php wp_nonce_field('update-options'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">List of <b>low-bandwidth</b> browsers</th>
        <td>
          <input name="rd_designswitch_low_list" type="text" size="50" maxlength="255" id="rd_designswitch_low_list" value="<?php echo get_option('rd_designswitch_low_list'); ?>" />
          <p><i>Words that might be found in a browser's reported "user agent" that would identify it as requiring the "low-bandwidth" version of the website by default. Keywords are separated by commas.</i></p>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">List of <b>high-bandwidth</b> browsers</th>
        <td>
          <input name="rd_designswitch_high_list" type="text" size="50" maxlength="255" id="rd_designswitch_high_list" value="<?php echo get_option('rd_designswitch_high_list'); ?>" />
          <p><i>For browsers that don't fulfill the above criteria, these are words that might be found in a browser's reported "user agent" that would identify it as requiring the "high-bandwidth" version of the website by default. Keywords are separated by commas.</i></p></td>
      </tr>
      <tr valign="top">
        <th scope="row">&#160;</th>
        <td>
          <p><i>All browsers that don't get spotted using the above lists are assumed to be "low-bandwidth".</i></p></td>
      </tr>
    </table>
    
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="rd_designswitch_low_list,rd_designswitch_high_list" />
    
    <p>
      <input type="submit" value="<?php _e('Save Changes') ?>" class="button-primary" />
    </p>
  
  </form>

</div>