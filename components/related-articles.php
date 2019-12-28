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
    'post_type' => array('project', 'event', 'publication', 'press'),
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
  