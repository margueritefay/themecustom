<?php get_header(); ?>

<section>
  <?php
  if(have_posts()) :?>
  <div class="container">
    <?php  while(have_posts()): the_post();
      $date = sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>',
      esc_attr(get_the_date('c')), esc_html(get_the_date()));
    ?>
      <div class="row m-dw-30">
        <div class="col-xs-10">
          <h2><?php the_title(); ?></h2>
          <p> <?php
              echo themecustom_give_me_meta(
                                esc_attr( get_the_date('c')),
                                esc_html( get_the_date()),
                                get_the_category_list(', '),
                                get_the_tag_list('', ', ')
                              );
              ?>
          </p>
          <?php the_content(); ?>
        </div>
      </div>
      <?php  endwhile;?>
      <div class="row">
        <div class="col-xs-12">
          <nav>
            <ul class="post-pager">
              <li><?php previous_post_link(); ?></li>
              <li><?php next_post_link(); ?></li>
            </ul>
          </nav>
        </div>
      </div>
    <?php  else: echo "Il n'y a pas de résultat";
      endif;
    ?>
  </div>

  <!-- end container-->
</section>

<?php get_footer(); ?>
