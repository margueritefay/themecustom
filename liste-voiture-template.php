<?php
/*
 Template Name: liste des voitures
*/
get_header();

?>

<!-- requete qui récupère quatre vignette de disc aléatoire-->
<?php
$args_media_front = array(
  'post_type'=>'tc_voiture',
  'posts_per_page' => 12
);
$affiche_quatre_disc = new WP_Query($args_media_front);
?>

<!-- Section qui affiche quatre discs de facon random-->
<?php if($affiche_quatre_disc->have_posts()): ?>
  <section id="media-front" class="p-3">
    <div class="container m-dw-30">
      <div class="row">
        <?php while($affiche_quatre_disc->have_posts()):
          $affiche_quatre_disc->the_post();
           ?>
            <article class="col-xs-12 col-sm-6 col-md-3">
              <div class="card text-center">
                <?php
                    the_post_thumbnail('medium', array('class' => 'card-img-top'));
                    ?>
                <div class="card-body">
                  <h4><?php the_title(); ?></h4>
                  <p><b>Année : </b><?php echo get_post_meta($post->ID, '_media_meta_an', true);  ?> </p>
                  <p><b>Prix : </b><?php echo get_post_meta($post->ID, '_media_meta_prix', true);  ?> </p>
                  <p><b>Marque : </b><?php echo get_post_meta($post->ID, '_media_meta_marque', true);  ?> </p>
                </div>
              </div>
            </article>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
