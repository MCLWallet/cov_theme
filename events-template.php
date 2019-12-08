<?php
/*
Template Name: Events Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="container">
    <div class="row">
      <!-- TODO: Implement Search Filter (Projects) -->
      <div class="list event col-12">
        <?php
          // prepare WP Query to render event posts
          $date_now = date('Ymd');
          $events_shown = get_field('events_shown');
          switch ($events_shown) {
            case 'past':
              $meta_query = array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $date_now,
                'type' => 'DATETIME'
              );
              break;
            case 'current':
              $meta_query = array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $date_now,
                'type' => 'DATETIME'
              );
              break;
            default:
              break;
          }
          // Show only past or current events
          if ($events_shown != 'all') {
            $args = array( 
              'post_type' => array('veranstaltungen'),
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'meta_query' => array($meta_query)
            );
          }
          // Show all events
          else {
            $args = array( 
              'post_type' => array('veranstaltungen'),
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'DESC'
            );
          }
          
          $event_post_query = new WP_Query($args);

          // Loop through each event post
          if ($event_post_query->have_posts()) {
            while($event_post_query->have_posts()): $event_post_query->the_post();

              $event_date = get_field('event_date');
              $speaker = get_field('speaker');
              $event_location = get_field('event_location');
              $event_time = get_field('event_time');

              $date_format = DateTime::createFromFormat('Ymd', $event_date);
              $date_format_translate = strtotime($event_date);
              ?>

              <a href="<?php echo the_permalink(); ?>" class="item event">
                <div class="date">
                  <div class="day"><?php echo $date_format->format('j'); ?></div>
                  <div class="month"><?php echo date_i18n('M', $date_format_translate); ?></div>
                  <div class="year"><?php echo $date_format->format('Y'); ?></div>
                </div>
                <div class="info">
                  <p><?php get_child_categories('Veranstaltungsart'); ?></p>
                  <h3><?php echo the_title(); ?></h3>
                  <h4><?php echo $speaker; ?></h4>

                  <p><?php echo $event_location; ?></p>
                  <p><?php echo 'Beginn: ' . $event_time; ?></p>
                  
                </div>

                <?php get_template_part('components/item-themes'); ?>
                
              </a> <?php
            endwhile;
          }
        ?>
      </div>
    </div>
  </div>


<?php get_footer(); ?>