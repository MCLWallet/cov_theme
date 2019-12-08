<?php
$speaker = get_field('speaker');
$event_date = get_field('event_date');
$event_time = get_field('event_time');
$event_location = get_field('event_location');

$date_format = DateTime::createFromFormat('Ymd', $event_date);
$date_format_translate = strtotime($event_date);
$new_date_format = date_i18n('l, j. F Y', $date_format_translate);


?>

<div class="container single">
  <div class="row">
    <div class="back-to-overview col-12 col-lg-3">
      <a href="<?php echo bloginfo('url') . '/veranstaltungen'; ?>"> 
        <?php get_template_part('assets/svg/arrow_left'); ?>
        Zurück zur Übersicht
      </a>
      <!-- TODO: Include speaker image -->
    </div>
    <div class="single-details events col-12 col-lg-9">
      <h3><?php echo the_title(); ?></h3>
      <p>Der Club Of Vienna möchte Sie herzlich einladen zu</p>

      <h4><?php echo the_title(); ?></h4>
      <h4><?php echo $speaker; ?></h4>

      <div class="hard-facts">
        <p><?php echo $new_date_format . ', Beginn ' . $event_time; ?></p>
        <p><?php echo $event_location; ?></p>
      </div>
      

      <p> <?php the_content(); ?></p>

    </div>
  </div>
  <div class="row related events">
    <div class="heading-wrapper col-12">
      <h3>Weitere Veranstaltungen</h3>
    </div>
    <?php //get_template_part('components/related-articles'); ?>
    <?php
    $args = array(
      'post__not_in' => array($post->ID),
      'post_type' => array('veranstaltungen'),
      'posts_per_page' => 3,
      'caller_get_posts' => 1,
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
    );
    
    $related_posts_query = new WP_Query($args);
    if ($related_posts_query->have_posts()) {
      while($related_posts_query->have_posts()): $related_posts_query->the_post();
        $event_date = get_field('event_date');
        $speaker = get_field('speaker');
        $event_location = get_field('event_location');
        $event_time = get_field('event_time');

        $date_format = DateTime::createFromFormat('Ymd', $event_date);
        $date_format_translate = strtotime($event_date);
        ?>

        <a href="<?php echo the_permalink(); ?>" class="item event col-12 col-lg-4">
          <div class="date">
            <div class="day"><?php echo $date_format->format('j'); ?></div>
            <div class="month"><?php echo date_i18n('M', $date_format_translate); ?></div>
            <div class="year"><?php echo $date_format->format('Y'); ?></div>
          </div>
          <div class="info">
            <h4><?php echo $speaker; ?></h4>
            <h3><?php echo the_title(); ?></h3>
            
          </div>
        </a> <?php
      endwhile;
    }
    wp_reset_query();
    ?>
  </div>
  <div class="row">
    <div class="last-button col-12">
      <a href="<?php echo bloginfo('url') . '/veranstaltungen'; ?>" class="button secondary"> Alle Veranstaltungen</a>
    </div>
  </div> 
</div>