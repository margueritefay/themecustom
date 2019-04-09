<?php get_header(); ?>

<section>
  <div class="container">
    <?php if(have_posts()):
            while (have_posts()) : the_post();?>
            <div class="row m-dw-30">
              <div class="col-xs-12">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <?php the_content(); ?>
              </div>
            </div>
    <?php endwhile;
          else : ?>
          <div class="row">
            <div class="col-xs-12">
              <p>Pas de résultat</p>
            </div>
          </div>
      <?php endif ?>
  </div><!--end container-->
</section>

<?php get_footer(); ?>
