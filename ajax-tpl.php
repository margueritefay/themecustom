<?php
/*
Template Name:Ajax-test
*/

get_header(); ?>

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
      <div class="row">
        <div class="col-xs-12 bg-success">
          <form id="form-ajax-test" action="" method="post">
            <p>Saisir une chaine de caractère pour votre recherche</p>
            <input type="text" id="send-value" name="send-value" value="">
            <input type="submit" name="tc-ajax-test-submit" value="valider">
            <div id="result" class="m-up-20">

            </div>
          </form>
        </div>
      </div>
  </div><!--end container-->
</section>

<?php get_footer(); ?>
