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
    <div class="row">
      <?php global $wp_query;
      $big = 99999999;;
      $total_pages = $wp_query->max_num_pages;

      if($total_pages>1): ?>
      <div class="col-12 tc-pagination">
        <?php
          echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '/page/%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $total_pages,
            'prev_next' => True,
            'prev_text' => '"Page précédente"',
            'next_text' => '"Page suivante"'
          ))
         ?>
      </div>
    <?php endif; // fin de la pagination ?>
    </div>

  <!-- end container-->
  </div>
</section>

<?php get_footer(); ?>
