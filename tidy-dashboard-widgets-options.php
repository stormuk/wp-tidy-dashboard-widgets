<?php

//Add an option page
if(is_admin()){
  add_action('admin_menu', 'tidy_dashboard_widgets_menu');
  add_action('admin_init', 'tidy_dashboard_widgets_register_settings');
}


function tidy_dashboard_widgets_register_settings(){
  global $TIDY_DASHBOARD_WIDGETS;
  foreach($TIDY_DASHBOARD_WIDGETS as $k => $v){
    register_setting('tidy_dashboard_group', $k);
  }
}

function tidy_dashboard_widgets_menu(){
  add_options_page(
    "Tidy Dashboard Widgets Options", 
    "Tidy Dashboard", 
    'administrator', 
    'tidydashboardwidgets', 
    'tidy_dashboard_widgets_options'
  );
}


function tidy_dashboard_widgets_options(){
  global $TIDY_DASHBOARD_WIDGETS;
  ?>
<div class="wrap">
  <div id="icon-options-general" class="icon32">
    <br>
  </div>

  <h2><?php echo "Tidy Dashboard Widgets Options"; ?></h2>


  <form method="post" action="options.php">
  <?php settings_fields('tidy_dashboard_group'); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Select widgets to remove</th>
        <td>
          <?php
            foreach($TIDY_DASHBOARD_WIDGETS as $k => $v){
              ?>
              <label style="display: block;"> 
                <input type="checkbox" name="<?php echo $k ?>" value="1" <?php if(get_option($k) == 1){ echo 'checked="checked"'; } ?> />
                <?php echo $v['name'] ?>
              </label>
          <?php
            }
          ?>
        </td>
      </tr>
    </table>

    <p class="submit">
      <input type="submit" name="submit" class="button-primary" value="Save Options" />
    </p>

  </form>
</div>
<?php
}

?>