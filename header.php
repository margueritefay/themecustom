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
    <section>
      <div class="container landing-page-container">
        <div class="jumbotron landing-page-jumbotron">
          <div class="text-center">
            <h1>Voitures d'occasions</h1>
            <p>Trouvez la voiture de vos rêves.</p>
          </div>
            <form>
              <div class="row d-flex justify-content-center">
                <div class="form-group mr-2">
                  <input type="text" class="form-control" id="reseacrchCar" placeholder="Ex : Clio rouge, van essence">
                </div>
                <button type="submit" class="btn btn-light">Rechercher</button>
              </div>
            </form>
        </div>
        <div class="jumbotron garanties-jumbotron">
          <div class="garanties mx-auto col-xs-12 col-md-10 col-sm-10">
            <div class="row d-flex justify-content-center">
              <div class="garantie text-center p-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/garantie-icon.png" alt="">
                <div>
                  <b>Véhicules garantis 3 ans</b>
                  <p>pièce et main d'oeuvre</p>
                </div>
              </div>
              <div class="garantie text-center p-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/garantie-icon.png" alt="">
                <div>
                  <b>Véhicules garantis 3 ans</b>
                  <p>pièce et main d'oeuvre</p>
                </div>
              </div>
              <div class="garantie text-center p-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/garantie-icon.png" alt="">
                <div>
                  <b>Véhicules garantis 3 ans</b>
                  <p>pièce et main d'oeuvre</p>
                </div>
              </div>
              <div class="garantie text-center p-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/garantie-icon.png" alt="">
                <div>
                  <b>Véhicules garantis 3 ans</b>
                  <p>pièce et main d'oeuvre</p>
                </div>
              </div>
            </div>
          </div>
          <h2 class="text-center mb-5">Nos dernières voitures</h2>
        </div>

      </div>
    </section>
<!-- end jumbotron-->
