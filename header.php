<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(is_home()): ?>
      <meta name="description" content="Page de blog du site avec theme custom">
    <?php endif; ?>

    <?php if(is_front_page()): ?>
      <meta name="description" content="Page d'acceuil du site avec theme custom">
    <?php endif; ?>
    <?php if(is_page() && !is_front_page()): ?>
      <meta name="description" content="Contenu d'une page du site avec theme custom">
    <?php endif; ?>
    <?php if(is_category()): ?>
      <meta name="description" content="Liste des articles pour la catégorie
      <?php echo single_cat_title('', false); ?> du site avec theme custom">
    <?php endif; ?>
    <?php if(is_tag()): ?>
      <meta name="description" content="Liste des articles pour le tag
      [<?php echo single_tag_title('', false); ?>] du site avec theme custom">
    <?php endif; ?>


    <?php wp_head(); ?>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Home theme custom</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          wp_nav_menu(array(
            'menu'           => 'top-menu',
            'theme_location' => 'primary',
            'depth'          => 2,
            'container'      => 'div',
            'container_class'=> 'collapse navbar-collapse',
            'container_id'   => 'bs-example-navbar-collapse-1',
            'menu_class'     => 'nav navbar-nav',
            'fallback_cb'    => 'class-wp-bootstrap-navwalker::fallback',
            'walker'         => new WP_Bootstrap_Navwalker()
          )
        );
         ?>
      </nav>
    </header>
    <div class="container">
      <div class="jumbotron">
        <?php $theme_options = get_option('tc_options') ?>
        <div class="row">
          <div class="col-4">
            <img class="img-responsive" src="<?php echo $theme_options['image_01_url']; ?>"
            alt="image en-tête">
            <p><?php echo $theme_options['legend_01']; ?></p>
          </div>
          <div class="col-8">
            <h1>Page d'accueil du thème custom</h1>
          </div>
        </div>
      </div>
    </div><!-- end jumbotron-->
