<?php

add_action( 'admin_menu', 'nodelay_create_menu');
function nodelay_create_menu() {
  add_submenu_page('options-general.php', 'noDelay', 'noDelay', 'manage_options', 'no-delay', 'nodelay_settings_page');
}

function nodelay_settings_page() {
  ?>
  <div class="wrap">
    <h2>noDelay Settings</h2>
    <form action="options.php" method="POST">
      <?php settings_fields('nodelay_url'); ?>
      <?php settings_fields('nodelay_authtoken'); ?>
      <?php do_settings_sections('noDelay'); ?> 
      <?php submit_button(); ?>
    </form>
  </div> 
  <?php
  
}

function plugin_options_init(){

  register_setting(
    'nodelay_url',          // Option group*
    'nodelay_url',          // Option Name*
    'nodelay_url_validate'   // Sanitize Callback Function
    );
  register_setting(
    'nodelay_authtoken',         // Option group*
    'nodelay_authtoken',         // Option Name*
    'nodelay_authtoken_validate'  // Sanitize Callback Function
    );
  add_settings_section(
    'nodelay-general',              // ID/Slug*
    ' ',                            // Name*
    'nodelay_section_callback',     // Callback*
    'noDelay'                       // Page on which to add this section of options*
    );
  add_settings_field(
    'nodelay_function_url',        // ID*
    'URL',                             // Title*
    'nodelay_url_callback',      // Callback Function*
    'noDelay',                    // Page (Plugin)*
    'nodelay-general'                 // Section
    ); 
  add_settings_field(
    'nodelay_function_authentication',     // ID*
    'Authentication Token',             //Title*
    'nodelay_authentication_callback',  //Callback Function*
    'noDelay',                        //Page(Plugin)*
    'nodelay-general'                     //Section
    );

}

add_action( 'admin_init', 'plugin_options_init' );


function nodelay_section_callback() {

}

function nodelay_url_callback() {
  $options = get_option('nodelay_url');
  echo "<input name='nodelay_url[text_string]' id='nodelay_function_url' size='40' type='text' value='{$options['text_string']}' />";
}

function nodelay_authentication_callback() {
  $options = get_option('nodelay_authtoken');
  echo "<input name='nodelay_authtoken[text_string]' id='nodelay_function_authentication' size='40' type='text' value='{$options['text_string']}' />";
}
//validate our options
function nodelay_url_validate($input_url) {
  $output_url = get_option('nodelay_url');
  $output_url['text_string'] = trim($input_url['text_string']);
  if(!preg_match('#(https?:\/\/(localhost|([a-z0-9-]+\.)+[a-z]{2,6}|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(:[0-9]+)?(\/?|\/\S+)$)#i', $output_url['text_string'])) {
    $output_url['text_string'] = '';
  }
  return $output_url;
}

function nodelay_authtoken_validate($input_auth) {
  $output_auth = get_option('nodelay_authtoken');
  $output_auth['text_string'] = trim($input_auth['text_string']);
  return $output_auth;
}
