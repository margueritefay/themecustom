<div class="row m-dw-30">
  <div class="col-xs-2">
    <!-- La vignette -->
    <?php
      if($thumbnail_param = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')):
        $image_src = $thumbnail_param[0];
    ?>
    <img class="img-responsive img-thumbnail" src="<?php echo $image_src; ?>" alt="image du post .<?php the_title(); ?>">
    <?php
      endif;
    ?>
  </div>
  <div class="col-xs-10">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p> <?php
        echo themecustom_give_me_meta(
                          esc_attr( get_the_date('c')),
                          esc_html( get_the_date()),
                          get_the_category_list(', '),
                          get_the_tag_list('', ', ')
                        );
        ?>
    </p>
    <?php the_excerpt(); ?>
  </div>
</div>
