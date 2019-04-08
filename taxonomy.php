<?php get_header();?>
<section>
  <?php
  if(have_posts()) :?>
  <div class="container">
    <?php  while(have_posts()): the_post();
           get_template_part('content');
           endwhile;
    ?>
  </div>

  <!-- end container-->
  <?php  else: echo "Il n'y a pas de résultat";
    endif;
  ?>
</section>

<?php get_footer(); ?>
