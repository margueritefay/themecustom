<?php get_header(); ?>

<section>
  <?php
  if(have_posts()) :?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p class="lead">Archives de la catégorie <?php single_cat_title('', true); ?></p>
      </div>
    </div>


    <?php  while(have_posts()): the_post();
        get_template_part('content');
    endwhile;?>
  </div>

  <!-- end container-->
  <?php  else: echo "Il n'y a pas de résultat";
    endif;
  ?>
</section>

<?php get_footer(); ?>
