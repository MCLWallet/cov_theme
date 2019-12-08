
<?php
function renderEventPreviewItem($post_obj) {
  if ($post_obj) { 
    $event_location = get_field('event_location', $post_obj);
    $event_date = get_field('event_date', $post_obj); ?>

    <a href="<?php echo get_the_permalink($post_obj); ?>" class="event-preview-item">
      <div class="date"> <?php
        $date_format = DateTime::createFromFormat('Ymd', $event_date);
        $date_format_translate = strtotime($event_date); ?>

        <div class="day"><?php echo $date_format->format('j'); ?></div>
        <div class="month"><?php echo date_i18n('M', $date_format_translate); ?></div>
        <div class="year"><?php echo $date_format->format('Y'); ?></div>
      </div>
      <div class="details">
        <div class="event-title">
          <h3><?php echo get_the_title($post_obj); ?></h3>
        </div>
        <div class="event-location"> <?php
          if ($event_location) { ?>
            <p><?php echo $event_location; ?></p> <?php
          } ?>
        </div>
      </div>
    </a> <?php
  }
}
?>

<div id="hero-section" class="hero-section">
    <div class="event-image">
      <?php get_template_part('components/hero-image-carousel'); ?>
    </div>
    <div class="next-events-block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-11 col-xl-9">
            <h2> Nächste Termine</h2> <?php
            $event_preview_1 = get_field('event_preview_1');
            $event_preview_2 = get_field('event_preview_2');
            $event_preview_3 = get_field('event_preview_3');
            renderEventPreviewItem($event_preview_1);
            renderEventPreviewItem($event_preview_2);
            renderEventPreviewItem($event_preview_3); ?>
            <a href="<?php bloginfo('url'); ?>/veranstaltungen" class="button secondary"> Alle Veranstaltungen</a>
          </div>
        </div>
      </div>
    </div>
    <div class="mission-statement">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-7"> <?php
            $intro_text = get_field('intro_text');
            if ($intro_text) { ?>
              <p> <?php echo $intro_text; ?></p> <?php
            } ?>
            <a href="<?php bloginfo('url'); ?>/der-club" class="button secondary"> Mehr Erfahren</a>      
          </div>
        </div>
      </div>
      
    </div>
  </div>