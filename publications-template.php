<?php
/*
Template Name: Publications Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="container">
    <div class="row">
      <div class="list publication col-12">
        <div class="row">
          <?php
            // prepare pagination query
            $count = get_option('posts_per_page', 10);
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $offset = ($paged - 1) * $count;

            // prepare WP Query to render all publication posts 
            $args = array( 
              'post_type' => array('publication'),
              'posts_per_page' => $count,
              'paged' => $paged,
              'offset' => $offset
            );
            $publication_post_query = new WP_Query($args);

            // Loop through each publication post
            if ($publication_post_query->have_posts()) {
              while($publication_post_query->have_posts()): $publication_post_query->the_post(); 
                $author = get_field('author'); ?>

                <div class="publication-wrapper col-12 col-lg-6"> 
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                  <div class="publication-info">
                    <h3><?php echo get_the_title(); ?></h3>
                    <h4> <?php echo $author; ?></h4>
                    <p><?php echo get_the_excerpt(); ?></p>
                  </div>
                  <a href="<?php echo get_the_permalink();?>" class="button primary"> Mehr Erfahren </a>
                </div>

              <?php

            endwhile;
            }
          ?>
        </div>
        <div class="row"> 
          <div class="col-12 pagination-links">
            <?php
              echo paginate_links(array(
                'total' => $publication_post_query->max_num_pages
              ));
              wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php get_footer(); ?>