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
          // prepare WP Query to render all project posts 
          $args = array( 'post_type' => array('projekte') );
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
    </div>
  </div>



<?php get_footer(); ?>