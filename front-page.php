<!-- Page permettant l'affichage de la page d'accueil -->
<?php get_header(); ?>

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
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><?php the_title(); ?></h2>
                <div class="panel-body">
                  <p><?php
                      the_post_thumbnail('medium', array('class' => 'img-responsive aligncenter'));
                      the_excerpt(); ?></p>
                  <div class="panel-footer">
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
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

<?php endif; ?>

<!-- Section qui affiche le contenu de la page d'accueil-->
<section>
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
