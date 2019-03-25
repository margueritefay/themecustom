<?php

//=================================================
//=================       CHARGEMENT DES STYLES
//=================================================
define('THEMECUSTOM_VERSION', '1.0.2');

//chargement dans le front
function themecustom_scripts(){

  //chargement des styles
  wp_enqueue_style('themecustom_bootstrap-core', get_template_directory_uri().'/css/bootstrap.min.css',
  array(), 'THEMECUSTOM_VERSION', 'all');
  wp_enqueue_style('themecustom_custom', get_template_directory_uri().'/style.css',
  array('themecustom_bootstrap-core'), 'THEMECUSTOM_VERSION', 'all');

  //chargement des scripts
  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js',
  array('jquery'), 'THEMECUSTOM_VERSION', true);

  wp_enqueue_script('themecustom_admin_script', get_template_directory_uri().'/js/tc.js',
  array('jquery', 'bootstrap-js'), 'THEMECUSTOM_VERSION', true);
} //fin fonction chargament style dans front-end

add_action('wp_enqueue_scripts', 'themecustom_scripts');

//chargement dans le panneau admin
function themecustom_admin_scripts(){

  //style dans le panneau d'admin
  wp_enqueue_style('themecustom_adm-core', get_template_directory_uri().'/css/bootstrap.min.css',
  array(), 'THEMECUSTOM_VERSION', 'all');
} //fin fonction chargement des styles dans panneau d'admin

add_action('admin_init', 'themecustom_admin_scripts');

//================================================================
//===================== UTILITAIRES
//================================================================


function themecustom_setup(){

  //rajoute le support pour les images à la une des articles
  add_theme_support('post-thumbnails');

  //enlève le générateur de Version
  remove_action('wp_head', 'wp_generator');

  //enlève les guillemets à la française
  remove_filter('the_content', 'wptexturize');

  //support du Titre
  add_theme_support('title-tag');

  //register custom navigation for bootstrap
  require_once('includes/class-wp-bootstrap-navwalker.php');

  // active la gestion des menus
  register_nav_menus(array('primary' => 'principal',));
} //fin de la fonction themecustom_setup

add_action('after_setup_theme', 'themecustom_setup');

//==============================================================
//========================== affichage des dates et catégories
//==============================================================

//type de résultat : <time class="entry-date" datetime="2019-03-20T22:33:42+00:00">20 mars 2019</time>
function themecustom_give_me_meta($date1, $date2, $categories, $tags){
  $chaine  = 'Publié le <time class="entry-date" datetime="';
  $chaine .= $date1;
  $chaine .= '">';
  $chaine .= $date2;
  $chaine .= '</time> dans la categorie ';
  $chaine .= $categories;
  $chaine .= ' avec les étiquettes : '. $tags;

  return $chaine;
}

//=================================================================
//=========================== show more
//=================================================================
function themecustom_show_more($more){
  return '<a class="more-link" href="' . get_permalink() .'">'. '[Lire la suite]' . '</a>';
}
add_filter('excerpt_more', 'themecustom_show_more');
 ?>
