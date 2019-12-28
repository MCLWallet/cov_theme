<?php
/*
Template Name: Presse Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="container">
    <div class="row">
      <div class="list press col-12">
        <div class="row">
          <?php
          $count = 9;
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $offset = ($paged - 1) * $count;
          // prepare WP Query to render all press posts 
          $args = array( 
            'post_type' => 'press',
            'posts_per_page' => $count,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'press_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'          
          );
          $press_post_query = new WP_Query($args);

          // Loop through each press post
          if ($press_post_query->have_posts()) {
            while($press_post_query->have_posts()): $press_post_query->the_post();
              $press_date = get_field('press_date'); ?>

              <a href="<?php the_permalink(); ?>" class="item press col-12 col-lg-4">
              <div class="headings">
                <h3><?php the_title(); ?></h3>
                <h4> <?php echo $press_date; ?></h4>
              </div>
                
                <p><?php echo get_the_excerpt(); ?> </p>
                <span>
                  <?php echo get_go_to_label('press'); ?>
                  <?php get_template_part('assets/svg/arrow_right'); ?>
                </span>
              </a> <?php
            endwhile;
            
          }
          else {
            // No posts found
          } ?>
        </div>
        <div class="row"> 
          <div class="col-12 pagination-links">
            <?php
              echo paginate_links(array(
                'total' => $press_post_query->max_num_pages
              ));
              wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>