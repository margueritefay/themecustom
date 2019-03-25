<?php

function themecustom_save_options(){
  if(!current_user_can('publish_pages')){
    wp_die('Vous n\'avez pas l\'autorisation pour effectuer cette opération !');
  }

  //se réfère à la fonction wp_nonce_field
  check_admin_referer('tc_options_verify');

  $options = get_option('tc_options');
  $options['legend_01'] = sanitize_text_field($_POST["tc_legend_01"]);
  update_option('tc_options', $options);

  wp_redirect(admin_url('admin.php?page=tc_theme_opts&status=1'));
  exit;
}//fin de la fonction tc_save_options


?>
