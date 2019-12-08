<?php 
$press_date = get_field('press_date');
?>

<div class="container single">
  <div class="row">
    <div class="back-to-overview col-12 col-lg-3">
      <a href="<?php echo bloginfo('url') . '/presse'; ?>"> 
        <?php get_template_part('assets/svg/arrow_left'); ?>
        Zurück zur Übersicht
      </a>
    </div>
    <div class="single-details press col-12 col-lg-9">
      <h3><?php echo the_title(); ?></h3>
      <h4><?php echo $press_date; ?></h4>
      
      <?php echo the_content(); ?>

    </div>
  </div>
  <div class="row related press">
    <div class="heading-wrapper col-12">
      <h3>Weitere Artikel</h3>
    </div>
    <?php
    $meta_query = array(
      'key' => 'press_date',
      'compare' => '<=',
      'value' => $press_date,
      'type' => 'DATETIME'
    );
    $args = array(
      'post__not_in' => array($post->ID),
      'post_type' => array('presse'),
      'meta_key' => 'press_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'posts_per_page' => 3,
      'caller_get_posts' => 1,
      'meta_query' => array($meta_query)
    );
    
    $related_posts_query = new WP_Query($args);
    if ($related_posts_query->have_posts()) {
      while($related_posts_query->have_posts()): $related_posts_query->the_post();
        $press_date = get_field('press_date');
        ?>
        <a href="<?php the_permalink(); ?>" class="related-item col-12 col-lg-4">
          <div class="heading">
            <h4><?php the_title(); ?></h4>
            <h5><?php echo $press_date;?></h5>
          </div>
          
          <p><?php echo get_the_excerpt(); ?> </p>
          <span href="#">
            <?php echo get_go_to_label('presse'); ?>
            <?php get_template_part('assets/svg/arrow_right');?>
          </span>
        </a>
      <?php
      endwhile;
    }
    wp_reset_query();
    ?>
  </div>
  <div class="row">
    <div class="last-button col-12">
      <a href="<?php echo bloginfo('url') . '/presse'; ?>" class="button secondary"> Alle Artikel</a>
    </div>
  </div> 
</div>