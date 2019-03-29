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

  wp_enqueue_style('themecustom_bootstrap-core-map', get_template_directory_uri().'/css/bootstrap.min.css.map',
  array(), 'THEMECUSTOM_VERSION', 'all');

  if(is_front_page()){
    wp_enqueue_style('themecustom_animate', get_template_directory_uri().'/css/animate.css',
    array(), 'THEMECUSTOM_VERSION', 'all');
  }

  wp_enqueue_style('themecustom_custom', get_template_directory_uri().'/style.css',
  array('themecustom_bootstrap-core', 'themecustom_bootstrap-core-map', 'themecustom_animate'), 'THEMECUSTOM_VERSION', 'all');

  //chargement des scripts
  wp_enqueue_script('bootstrap-js-map', get_template_directory_uri().'/js/bootstrap.min.js.map',
  array('jquery'), 'THEMECUSTOM_VERSION', true);

  wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js',
  array('jquery'), 'THEMECUSTOM_VERSION', true);

  wp_enqueue_script('themecustom_admin_script', get_template_directory_uri().'/js/tc.js',
  array('jquery', 'bootstrap-js', 'bootstrap-js-map'), 'THEMECUSTOM_VERSION', true);
} //fin fonction chargament style dans front-end

add_action('wp_enqueue_scripts', 'themecustom_scripts');


//=============================================================================
//===================== CHARGEMENT DES STYLES ET SCRIPTS DANS LE BACK OFFICE
//=============================================================================
function themecustom_admin_init(){

//********** action 1
  function themecustom_admin_scripts(){

    if(!isset($_GET['page']) || $_GET['page'] != 'tc_theme_opts'){
      return;
    }
    //chargement style dans le panneau d'admin
    wp_enqueue_style('themecustom_adm-core', get_template_directory_uri().'/css/bootstrap.min.css',
    array(), 'THEMECUSTOM_VERSION', 'all');

    //chargement des scripts admin
    //wp_enqueue_media permet de rendre le media uploader de wp disponible
    wp_enqueue_media();
    wp_enqueue_script('tc-admin-init', get_template_directory_uri() . '/js/admin-options.js',
    array(), 'THEMECUSTOM_VERSION', true);
  } //fin fonction chargement des styles dans panneau d'admin
  add_action('admin_enqueue_scripts', 'themecustom_admin_scripts');

    //******** action 2
    include('includes/save-options-page.php'); //contient la focntion tc_save_options
    add_action('admin_post_themecustom_save_options', 'themecustom_save_options');

} //fin de la fonction themecustom_admin_scripts

add_action('admin_init', 'themecustom_admin_init');



//================================================================
//===================== ACTIVATION DES OPTIONS
//================================================================

function themecustom_activate_options(){
  $theme_options = get_option('tc_options');
  if(!$theme_options){
    $options = array(
      'image_01_url' =>'',
      'legend_01'    =>''
    );
    add_option('tc_options', $options);
  }
}
//after_switch_theme permet d'executer la fonction uniquement lors
//de l'activation du thème.
add_action('after_switch_theme', 'themecustom_activate_options');


//================================================================
//===================== MENU OPTIONS DU THEME
//================================================================
function themecustom_admin_menus(){
  add_menu_page(
    'Themecustom Options',
    'Options du thème',
    'publish_pages',
    'tc_theme_opts',
    'tc_build_options_page'
  );

  //on inclu le fichier on se trouve la fonction tc_build_options_page()
  include('includes/build-options-page.php');

}//fin fonction themecustom_admin_menus

add_action('admin_menu', 'themecustom_admin_menus');

//================================================================
//===================== AJOUT SIDEBAR ET WIDGET DANS ADMIN
//================================================================

function themecustom_widget_init(){
  register_sidebar( array(
    'name' => 'Footer Widget Zone',
    'description' => 'Widget affichés dans le footer, 4 max',
    'id' => 'widgetized-footer',
    'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-3 %2$s"><div class="inside-widget">',
    'after_widget' => '</div></div>',
    'before_title' => '<h2 class="h3 text-center">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'themecustom_widget_init');

//================================================================
//===================== UTILITAIRES
//================================================================


function themecustom_setup(){

  //rajoute le support pour les images à la une des articles
  add_theme_support('post-thumbnails');

  //crée un format image pour le slider-front
  add_image_size('front-slider', 1140, 420, true);

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


//======================================================================================
//========================== ajout de la taille medium large pour la sélection image
//======================================================================================

function my_images_sizes($sizes){
  $addsizes = array(
    "medium_large" => "Medium Large"
  );
  $newsizes = array_merge($sizes, $addsizes);
  return $newsizes;
}

add_filter('image_size_names_choose', 'my_images_sizes');


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
  if(strlen($tags)>0):
  $chaine .= ' avec les étiquettes : '. $tags;
  endif;
  return $chaine;
}

//=================================================================
//=========================== show more
//=================================================================
function themecustom_show_more($more){
  return '<a class="more-link" href="' . get_permalink() .'">'. '[Lire la suite]' . '</a>';
}
add_filter('excerpt_more', 'themecustom_show_more');


//=============================================================================
//===================== CPT Slider frontal page d'accueil
//=============================================================================

function tc_slider_init(){
  $labels = array(
    'name' => 'Images Carousel Accueil',
    'singular_name' => 'Images accueil',
    'add_new' => 'Ajouter une image',
    'add_new_item' => 'Ajouter une Image accueil',
    'edit_item' => 'Editer une Image accueil',
    'new_item' => 'Nouveau',
    'all_items' => 'Voir la liste',
    'view_item' => 'Voir l\'élément',
    'search_item' => 'Chercher une Image accueil',
    'not_found' => 'Aucun élément trouvé',
    'not_found_in_trash' => 'Aucun élément dans la corbeille',
    'menu_name' => 'Slider frontal'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => 20,
    'menu_icon' => get_stylesheet_directory_uri() . '/assets/camera.png',
    'publicly_queryable' => false,
    'exclude_from_search' => true,
    'supports' => array('title', 'page-attributes', 'thumbnail')
  );
  register_post_type('tc_slider', $args);
}//end function slider init

add_action('init', 'tc_slider_init');

//=============================================================================
//===================== Ajout de l'image et ordre dans la colonne admin slider
//=============================================================================

add_filter('manage_edit-tc_slider_columns', 'tc_col_change'); //change le nom des colonnes

function tc_col_change($columns){
  $columns['tc_slider_image_order'] = "ordre";
  $columns['tc_slider_image'] = "image affichée";

  return $columns;
}

add_action('manage_tc_slider_posts_custom_column', 'tc_content_show', 10, 2); //affiche les images et l'ordre

function tc_content_show($column, $post_id){
  global $post;
  if($column == 'tc_slider_image'){
    echo the_post_thumbnail(array(100, 100));
  }
  if($column == 'tc_slider_image_order'){
    echo $post->menu_order;
  }
}


//=============================================================================
//===================== Tri sur l'ordre dans la colonne admin slider
//============================================================================

add_filter('manage_edit-tc_slider_sortable_columns', 'my_sortable_tc_slider_column');

function my_sortable_tc_slider_column($columns){
  $columns['tc_slider_image_order']= 'menu_order';
  return $columns;
}
 ?>
