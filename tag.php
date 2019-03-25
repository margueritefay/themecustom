<?php get_header(); ?>

<section>
  <?php
  if(have_posts()) :?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p class="lead">Liste des articles avec l'étiquette <?php single_tag_title(); ?></p>
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
