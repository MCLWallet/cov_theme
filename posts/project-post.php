<?php
$project_title = get_field('project_title');
$project_leader_id = get_field('project_leader_id');
$project_start = get_field('project_start');
$project_end = get_field('project_end');
$project_publication = get_field('publication');
?>

<div class="container single">
  <div class="row">
    <div class="back-to-overview col-12 col-lg-3">
      <a href="<?php echo bloginfo('url') . '/projekte'; ?>"> 
        <?php get_template_part('assets/svg/arrow_left'); ?>
        Zurück zur Übersicht
      </a>
    </div>
    <div class="single-details project col-12 col-lg-9">
      <h3><?php echo the_title(); ?></h3> <?php 

        if ($project_title) { ?>
          <h4>Titel: </h4>
            <p> <?php echo $project_title; ?></p>    <?php
        } ?>
      
      <h4>Projektleitung: </h4>
      <p> <?php echo get_the_title($project_leader_id); ?></p>

      <h4>Projektzeitraum: </h4>
      <p><?php echo $project_start . ' - ' . $project_end; ?></p>

      <h4>Inhalt: </h4>
      <div class="the-content"> <?php the_content(); ?></div>
      <?php
        if($project_publication) { ?>
          <h4>Publikation: </h4>
          <p> <?php echo get_the_title($project_publication) . ': ' . get_field('author', $project_publication); ?>
            <a class="publication-link" href="<?php the_permalink($project_publication);?>">Zur Publikation</a>
          </p> 
          <?php
        }
      ?>
    </div>
  </div>
  
  <div class="row related project">
    <div class="heading-wrapper col-12">
      <h3>Weitere Projekte</h3>
    </div>
    <?php
    $categories = get_the_category($post->ID);
    if ($categories) {
      $category_terms = Array();
      foreach($categories as $category) {
        $category_terms[] = $category->term_id;
      }
      $args = array(
        'category__in' => $category_terms,
        'post__not_in' => array($post->ID),
        'post_type' => array('project'),
        'posts_per_page' => 3,
        'caller_get_posts' => 1
      );
      
      $related_posts_query = new WP_Query($args);
      if ($related_posts_query->have_posts()) {
        while($related_posts_query->have_posts()): $related_posts_query->the_post();
          $post_type = get_post_type();
            ?>
          <a href="<?php the_permalink(); ?>" class="related-item col-12 col-lg-4">
            <h4><?php the_title(); ?></h4>
            <p><?php echo get_the_excerpt(); ?> </p>
            <span href="#">
              <?php echo get_go_to_label($post_type); ?>
              <?php get_template_part('assets/svg/arrow_right');?>
            </span>
          </a>
        <?php
        endwhile;
      }
      wp_reset_query();
    }
    ?>
  </div>
  <div class="row">
    <div class="last-button col-12">
      <a href="<?php echo bloginfo('url') . '/projekte'; ?>" class="button secondary"> Alle Projekte</a>
    </div>
  </div>  
</div>


