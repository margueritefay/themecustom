<?php
/*
 Template Name: liste par styles
*/
get_header();

?>

<?php
  $tc_term_list = get_terms(array(
                            'taxonomy' => 'genre_mus',
                            'hide_empty' => true,
                          ));
  if(count($tc_term_list)>0):
    foreach ($tc_term_list as $tc_term) :?>
    <section class="media-front">
      <?php
        $arg_taxo_rupt = array(
          'post_type' => 'tc_voiture',
          'posts_per_page' => -1,
          'tax_query'=> array(array(
            'taxonomy'=>'genre_mus',
            'field'=>'slug',
            'terms' => $tc_term->slug
          ))
        );
        $req_taxo_rupt = new WP_Query($arg_taxo_rupt);
        if($req_taxo_rupt->have_posts()):?>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h1><?php echo $tc_term->name; ?></h1>
            </div>
            <?php while ($req_taxo_rupt->have_posts()):
                    $req_taxo_rupt->the_post();
             ?>
             <article class="col-xs-12 col-sm-6 col-md-3">
               <div class="card text-center">
                 <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive mx-auto')) ?>
                 <div class="card-footer">
                   <h1 class="h4 text-center"><?php the_title(); ?></h1>
                 </div>
               </div>
             </article>
           <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
        <?php endif; ?>
        </section>
      <?php  endforeach; endif; ?>
  <?php
  get_footer();?>
