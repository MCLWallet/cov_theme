<?php
$author = get_field('author');
$year = get_field('year');
$publication_title = get_field('publication_title');
$publisher = get_field('publisher');
$isbn = get_field('isbn');
$publication_comment = get_field('publication_comment');
?>


<div class="container single">
  <div class="row">
    <div class="back-to-overview col-12 col-lg-3">
      <a href="<?php echo bloginfo('url') . '/publikationen'; ?>"> 
        <?php get_template_part('assets/svg/arrow_left'); ?>
        Zurück zur Übersicht
      </a>
      <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="img-fluid book-cover">
    </div>
    <div class="single-details publication col-12 col-lg-9">
      <h3><?php echo the_title(); ?></h3>
      <h4><?php echo $author . ', ' . $year; ?></h4>

      <div class="hard-facts">
        <p><?php echo $author . ' (' . $year . ') ' . $publication_title . '. ' . $publisher . '. ISBN: ' . $isbn; ?></p>
        <p><?php echo $publication_comment; ?></p>
      </div>
      
      <?php the_content(); ?>

    </div>
  </div>
  <div class="row related publication">
    <div class="heading-wrapper col-12">
      <h3>Weitere Publikationen</h3>
    </div>
    <?php
    $args = array(
      'post__not_in' => array($post->ID),
      'post_type' => array('publikationen'),
      'posts_per_page' => 2,
      'caller_get_posts' => 1,
      'meta_key' => 'year',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
    );
    
    $related_posts_query = new WP_Query($args);
    if ($related_posts_query->have_posts()) {
      while($related_posts_query->have_posts()): $related_posts_query->the_post();
          ?>
        <div class="publication-wrapper col-12 col-lg-6"> <?php
          $author = get_field('author');?>
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
    wp_reset_query();
    ?>

  </div>
  <div class="row">
    <div class="last-button col-12">
      <a href="<?php echo bloginfo('url') . '/publikationen'; ?>" class="button secondary"> Alle Publikationen</a>
    </div>
  </div> 
</div>