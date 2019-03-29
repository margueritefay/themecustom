<?php //requete pour la création du slider client

  $args = array(
    'post_type' => 'tc_slider',
    'posts_per_page' => -1,
    'order_by' => 'menu_order',
    'order' => 'asc'
  );

  $slider_query = new WP_Query($args);
 if($slider_query->have_posts()):
 ?>

 <section class="m-dw-30">
  <div class="container">
    <div id="slider-01" class="carousel slide" data-ride="carousel">
      <!--Indicator-->
      <ol class="carousel-indicators">
        <?php
          $indicator_index = 0;
          while($slider_query->have_posts()) : $slider_query->the_post();
              echo '<li data-target="#slider-01" data-slide-to="'.$indicator_index.'"
              class="'.($indicator_index == 0 ? "active" : "").'"></li>';
              $indicator_index++;
          endwhile; ?>
      </ol>
      <!--wrapper for slides-->
      <div class="carousel-inner">

        <?php $active_test = true;
          while($slider_query->have_posts()) : $slider_query->the_post();

            $thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'front-slider');
            $thumbnail_src=$thumbnail_html['0'];

            $alt_value = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
            $alt_value = $alt_value[0];
            if($active_test){
              $theclass = " active";
            }
            else{
              $theclass = "";
            }?>
          <div class="carousel-item <?php echo $theclass; ?>">
            <img class="d-block w-100" src="<?php echo $thumbnail_src; ?>" alt="<?php echo $alt_value; ?>">
            <div class="carousel-caption d-none d-md-block">
              <h3><?php the_title(); ?></h3>
              <p><?php the_field('sous_titre'); ?></p>
            </div>
          </div>
        <?php $active_test = false;
        endwhile;
        wp_reset_postdata();?>
      </div>
      <a class="carousel-control-prev" href="#slider-01" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider-01" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!--fin du carrousel-->
  </div><!--fin du container-->
</section>

<?php endif; ?>
