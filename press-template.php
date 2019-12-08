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
          // prepare WP Query to render all press posts 
          $args = array( 
            'post_type' => array('presse'),
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
                  <?php echo get_go_to_label('presse'); ?>
                  <?php get_template_part('assets/svg/arrow_right'); ?>
                </span>
              </a> <?php
            endwhile;
          }
          ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>