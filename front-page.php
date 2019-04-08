<!-- Page permettant l'affichage de la page d'accueil -->
<?php get_header(); ?>

<!--Chargement du fichier slide-home.php
permet d'ajouter le slider sur la page d'accueil-->
<?php get_template_part('slider','home'); ?>

<!-- requete qui récupère quatre vignette de disc aléatoire-->
<?php
$args_media_front = array(
  'post_type'=>'tc_media',
  'posts_per_page' => 4,
  'order_by' =>'rand'
);
$affiche_quatre_disc = new WP_Query($args_media_front);
?>

<!-- Section qui affiche quatre discs de facon random-->
<?php if($affiche_quatre_disc->have_posts()): ?>
  <section id="media-front">
    <div class="container m-dw-30">
      <div class="row">
        <?php while($affiche_quatre_disc->have_posts()):
          $affiche_quatre_disc->the_post(); ?>
            <article class="col-xs-12 col-sm-6 col-md-3">
              <div class="card text-center">
                <div class="card-header">
                  <h4><?php the_title(); ?></h2>
                </div>
                <div class="card-body">
                  <p><?php
                      the_post_thumbnail('thumbnail', array('class' => 'img-responsive aligncenter'));
                      ?>
                  </p>
                </div>
              </div>
            </article>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

<?php endif; ?>


<!--requete qui récupère deux articles de blog-->
<?php
$args_blog = array(
  'post_type'=>'post',
  'posts_per_page' => 2
);
$affiche_deux_articles = new WP_Query($args_blog);
?>

<!-- Section qui affiche les deux derniers articles de blog-->
<?php if($affiche_deux_articles->have_posts()): ?>
  <section id="blog-posts-front">
    <div class="container">
      <div class="row">
        <?php while($affiche_deux_articles->have_posts()):
              $affiche_deux_articles->the_post(); ?>
          <div class="col-6">
            <div class="card text-center">
              <div class="card-header">
                <h2><?php the_title(); ?></h2>
              </div>
              <div class="card-body">
                <p><?php
                    the_post_thumbnail('medium', array('class' => 'img-responsive aligncenter'));
                    the_excerpt(); ?></p>
              </div>
              <div class="card-footer text-muted">
                <p><?php
                    echo themecustom_give_me_meta(
                                      esc_attr( get_the_date('c')),
                                      esc_html( get_the_date()),
                                      get_the_category_list(', '),
                                      get_the_tag_list('', ', ')
                                    );
                    ?></p>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

<?php endif; ?>

<!-- Section qui affiche le contenu de la page d'accueil-->
<section class="front-page-content">
  <?php
  if(have_posts()) :?>
  <div class="container">
    <?php
    while(have_posts()): the_post();?>
        <?php
          the_title('<h2 class="text-center">', '</h2>');
        ?>
        <div class="text-center">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
  </div>

  <!-- end container-->
  <?php  else: echo "Il n'y a pas de résultat";
    endif;
  ?>
</section>

<?php get_footer(); ?>
