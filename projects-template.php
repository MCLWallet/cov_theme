<?php
/*
Template Name: Projects Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="container">
    <div class="row">
      <!-- TODO: Implement Search Filter (Projects) -->
      <div class="list project col-12">
        <?php
          // prepare pagination query
          $count = get_option('posts_per_page', 10);
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $offset = ($paged - 1) * $count;

          // prepare WP Query to render all project posts 
          $args = array( 
            'post_type' => array('project'),
            'posts_per_page' => $count,
            'paged' => $paged,
            'offset' => $offset
          );
          $project_post_query = new WP_Query($args);

          if ($project_post_query->have_posts()) {
            while($project_post_query->have_posts()): $project_post_query->the_post();
              $project_leader_id = get_field('project_leader_id');
              $project_start = get_field('project_start');
              $project_end = get_field('project_end'); ?>

              <div class="item project">
                <div class="info">
                  <h3><?php echo the_title(); ?></h3>
                  <h4><?php echo get_the_title($project_leader_id[0]); ?></h4>
                  <p><?php echo 'Projektzeitraum: ' . $project_start . ' - ' . $project_end; ?></p>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div>
                <a href="<?php the_permalink(); ?>" class="button primary">Mehr Erfahren</a>

                <?php get_template_part('components/item-themes'); ?>
                
              </div> <?php
            endwhile;
          }
        ?>
      </div>
      <div class="col-12 pagination-links">
        <?php
          echo paginate_links(array(
            'total' => $project_post_query->max_num_pages
          ));
          wp_reset_postdata(); ?>
      </div>
    </div>
  </div>



<?php get_footer(); ?>