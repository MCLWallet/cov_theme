<?php get_header(); ?>

<?php 
get_template_part('components/sub-header');
?>

<div class="container search-results">
  <div class="row">
    <?php
      $event_heading_rendered = false; 
      $publication_heading_rendered = false; 
      $project_heading_rendered = false;
      $presse_heading_rendered = false;
      $other_heading_rendered = false;

      if ( have_posts() ) { 
        $num_posts = $wp_query->found_posts;
        if ($num_posts > 1) {
          $search_result_words = array('Es wurden ', ' Suchergebnisse ');
        }
        elseif ($num_posts == 1) {
          $search_result_words = array('Es wurde ', ' Suchergebnis ');
        }
        ?>
        <div class="col-12 message">
          <p><?php echo $search_result_words[0] . $num_posts . $search_result_words[1]; ?>  zu <strong><?php echo get_search_query(true); ?></strong> gefunden</strong>
        </div>
        <?php
        while ( have_posts() ): the_post();

        if (get_post_type() == 'veranstaltungen') { 
          if (!$event_heading_rendered) { ?>
            <div class="col-12 result-heading">
              <h3>Veranstaltungen</h3>
            </div> <?php
            $event_heading_rendered = true;
          } 
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
          </a>
          <?php
        }
        elseif (get_post_type() == 'publikationen') { 
          if (!$publication_heading_rendered) { ?>
          <div class="col-12 result-heading">
            <h3>Publikationen</h3>
          </div> <?php
          $publication_heading_rendered = true;
          } ?>
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
        }
        elseif (get_post_type() == 'projekte') { 
          if (!$project_heading_rendered) { ?>
            <div class="col-12 result-heading">
              <h3>Projekte</h3>
            </div> <?php
            $project_heading_rendered = true;
          } ?>
          <a href="<?php the_permalink(); ?>" class="related-item col-12 col-lg-4">
            <h4><?php the_title(); ?></h4>
            <p><?php echo get_the_excerpt(); ?> </p>
            <span href="#">
              <?php echo get_go_to_label($post_type); ?>
              <?php get_template_part('assets/svg/arrow_right');?>
            </span>
          </a>
          <?php
        }
        elseif (get_post_type() == 'presse') { 
          if (!$presse_heading_rendered) { ?>
            <div class="col-12 result-heading">
              <h3>Presse</h3>
            </div> <?php
            $presse_heading_rendered = true;
          }
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
        }
        ?>
          <!-- <a href="<?php //the_permalink(); ?>"><?php //the_title();?></a> </br> -->
        <?php

        endwhile;
      }
      else { ?>
      <div class="container search-results">
        <div class="row">
          <div class="col-12 message"> 
            <p>Es wurden leider keine Suchergebnisse zu <strong><?php echo get_search_query(true); ?></strong> gefunden.</p>
          </div>
        </div>
      </div>
        
        <?php
      }
      ?>
  </div>
</div>

<?php get_footer(); ?>