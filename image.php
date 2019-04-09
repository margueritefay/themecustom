<?php get_header(); ?>

<section>
  <div class="container">
    <?php if(have_posts()):
      while(have_posts()):the_post();
      $alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
      ?>
      <div class="col-xs-12">
        <h1>Image pincipale</h1>
      </div>
      <div class="row m-dw-30">
        <div class="col-sm-2 col-md-4"><!-- La vignette -->
          <img class="img-responsive img-thumbnail" src="<?php echo $post->guid; ?>" alt="">
        </div>
        <div class="col-sm-10 col-md-6">
          <h2 class="m-up-reset"><?php the_title(); ?></h2>
          <p>Image principale (id : <?php echo $post->ID; ?>)<?php echo $post->guid; ?></p>
          <div>
            <b>contenu : </b><?php echo $post->post_content; ?>
          </div>
          <div>
            <b>légende : </b><?php echo $post->post_excerpt; ?>
          </div>
          <div>
            <b>téléversé le : </b> <?php echo $post->post_date_gmt; ?>
          </div>
          <div>
            <b>Texte alternatif : </b> <?php echo $alt_text; ?>
          </div>
        </div>
      </div>
      <?php

      endwhile;
      else :
       ?>
       <div class="row">
         <div class="col-xs-12">
           <p>Pas de résultat</p>
         </div>
       </div>
     <?php endif; ?>
  </div><!--fin section container-->
</section>

<?php get_footer(); ?>
