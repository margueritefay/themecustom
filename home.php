<?php get_header(); ?>

<section>
  <?php
  if(have_posts()) :?>
  <div class="container">
    <?php //var_dump($wp_query); ?>
    <?php
       while(have_posts()):
           the_post();
           echo $post->post_title;
           get_template_part('content');
       endwhile;
     else:
       echo "Il n'y a pas de résultat";
    endif;
    ?>
  <!-- end container-->
  </div>
</section>

<?php get_footer(); ?>
