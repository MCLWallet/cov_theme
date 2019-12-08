<?php
  $video_highlight_box = get_field('video_highlight_box');
  $event_highlight_box = get_field('event_highlight_box');
  $rupert_riedl_highlight_box = get_field('rupert_riedl_highlight_box');
  $project_highlight_box = get_field('project_highlight_box');
  $publications_highlight_box = get_field('publications_highlight_box');

  ?>
  <div class="container-fluid">
    <div class="row"> <?php
      pushHighlightBoxToList($video_highlight_box, 'video_highlight_box', 'videos', 'Videos');
      pushHighlightBoxToList($event_highlight_box, 'event_highlight_box', 'events', 'Veranstaltung');
      pushHighlightBoxToList($rupert_riedl_highlight_box, 'rupert_riedl_highlight_box', 'rupert-riedl', 'Wiener Rupert-Riedl-Preis');
      pushHighlightBoxToList($project_highlight_box, 'project_highlight_box', 'projects', 'Projekte');
      pushHighlightBoxToList($publications_highlight_box, 'publications_highlight_box', 'publications-section', 'Publikationen');  
    ?>
    </div>
  </div>
  <?php
  
function pushHighlightBoxToList($highlight_box, $fieldname, $classname, $title) {
  if (have_rows($fieldname)) {
    while (have_rows($fieldname)) : the_row();
    $show_in_frontend = get_sub_field('show_in_frontend');

    // Did content editor activated the highlight box?
    if ($show_in_frontend) { 
      $order = get_sub_field('order');
      // Render Highlight Box Head
      if ($classname != 'publications-section') { ?>
        <div class="highlight-box <?php echo $classname . ' order-' . $order; ?>" >
          <div class="background"></div>
          <div class="container">
            <div class="row">
              <div class="info-wrapper col-md-12 col-lg-5"> 
                <h2><?php echo $title; ?></h2> <?php
                  // Get specific content
                  switch($classname) {
                    case 'videos':
                      $video_link = get_sub_field('video_link');
                      $video_type = get_sub_field('video_type');
                      $video_title = get_sub_field('video_title');
                      $video_meta = get_sub_field('video_meta');
                      $video_description = get_sub_field('video_description');
                      $video_thumbnail = get_sub_field('video_thumbnail');

                      if ($video_type) { ?>
                        <h3> <?php echo $video_type; ?> </h3> <?php
                      }
                      if ($video_title) { ?>
                        <h4> <?php echo $video_title; ?> </h4> <?php
                      }
                      if ($video_meta) { ?>
                        <h5> <?php echo $video_meta; ?> </h5> <?php
                      }
                      if ($video_description) { ?>
                        <p> <?php echo $video_description; ?> </p> <?php
                      }
                      if ($video_link) { ?>
                        <a href="<?php echo $video_link; ?>" class="button primary"> Video ansehen </a><?php
                      }
                      ?>
                        <a href="https://www.youtube.com/channel/UC5tA2WegjQEPA5Xn_vudXcw" class="button secondary"> Alle Videos</a>
                      </div>
                      <div class="image-wrapper col-md-12 col-lg-7"> <?php
                        if ($video_thumbnail) { ?>
                          <img src="<?php echo $video_thumbnail['url'] ?>" alt=""> <?php
                        }
                        else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/assets/img/test-image.png" alt=""> <?php
                        } ?>
                      </div>
                      <?php
                      break;

                    case 'events':
                      $post_object_id = get_sub_field('post_object_id');
                      $event_date = get_field('event_date', $post_object_id);
                      $speaker = get_field('speaker', $post_object_id);
                      $event_location = get_field('event_location', $post_object_id);
                      $event_thumbnail = get_sub_field('event_thumbnail');

                      $date_format = DateTime::createFromFormat('Ymd', $event_date);
                      $date_format_translate = strtotime($event_date);

                      if ($event_date) { ?>
                        <h3> <?php echo date_i18n('j. F Y', $date_format_translate); ?> </h3> <?php
                      } ?>

                      <h4> <?php echo get_the_title($post_object_id); ?> </h4> <?php

                      if ($event_location) { ?>
                        <h5> <?php echo $event_location; ?> </h5> <?php
                      } ?>
                      
                        <p> <?php echo get_the_excerpt($post_object_id); ?> </p>

                        <a href="<?php echo get_post_permalink($post_object_id); ?>" class="button primary"> Mehr Erfahren </a>
                        <a href="<?php echo bloginfo('url') . '/veranstaltungen'; ?>" class="button secondary"> Alle Veranstaltungen </a> 
                      </div>
                      <div class="image-wrapper col-md-12 col-lg-7"> <?php
                        if ($event_thumbnail) { ?>
                          <img src="<?php echo $event_thumbnail['url']; ?>" alt=""> <?php
                        }
                        else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/assets/img/rutsche.png" alt="">
                        <?php
                        }
                      ?>
                        
                      </div>

                      <?php
                      break;
                    case 'rupert-riedl':
                      $description = get_sub_field('description'); 
                      $rupert_riedl_thumbnail = get_sub_field('rupert_riedl_thumbnail');?>
                        <p> <?php echo $description; ?> </p>

                        <a href="<?php echo bloginfo('url') . '/wiener-rupert-riedl-preis'; ?>" class="button primary"> Mehr Erfahren </a>
                        <a href="<?php echo bloginfo('url') . '/wiener-rupert-riedl-preis#bewerbung'; ?>" class="button secondary"> Bewerbung </a>
                      </div>
                      <div class="image-wrapper col-md-12 col-lg-7"> <?php
                        if ($rupert_riedl_thumbnail) { ?>
                          <img src="<?php echo $rupert_riedl_thumbnail['url']; ?>" alt=""> <?php
                        }
                        else { ?>
                          <img src="<?php bloginfo('template_url'); ?>/assets/img/rupert_riedl.png" alt=""> <?php
                        } ?>
                      </div> <?php
                      break;
                    case 'projects':
                      $post_object_id = get_sub_field('post_object_id');
                      $project_start = get_field('project_start', $post_object_id);
                      $project_end = get_field('project_end', $post_object_id);
                      $project_leader_id = get_field('project_leader_id', $post_object_id); 
                      $project_thumbnail = get_sub_field('project_thumbnail'); 
                      ?>
                        <h3> Projektdauer: <?php echo $project_start . ' - ' . $project_end; ?> </h3> 
                        <h4> <?php echo get_the_title($post_object_id); ?></h4>
                        <h5> <?php echo get_the_title($project_leader_id);?></h5>
                        <p> <?php echo get_the_excerpt($post_object_id);?></p>

                        <a href="<?php echo get_post_permalink($post_object_id); ?>" class="button primary"> Mehr Erfahren </a>
                        <a href="<?php echo bloginfo('url') . '/projekte'; ?>" class="button secondary"> Alle Projekte </a> 
                      </div>
                      <div class="image-wrapper col-md-12 col-lg-7"> <?php
                        if ($project_thumbnail) { ?>
                            <img src="<?php echo $project_thumbnail['url']; ?>" alt=""> <?php
                          }
                          else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/grass.png" alt=""> <?php
                          } ?>
                      </div> <?php
                      break;
                    default:
                      break;
                  } ?>
            </div>
          </div>
        </div> <?php

      }
      // Render publications sections
      else { ?>
        <div class="publications-section container <?php echo 'order-' . $order; ?>">
          <div class="row">
            <div class="heading-wrapper col-12">
              <h2>Publikationen</h2>
            </div>
            <div class="publication-wrapper col-12 col-lg-6"> <?php
              $publication_post_1_id = get_sub_field('publication_post_1_id'); 
              $author = get_field('author', $publication_post_1_id);?>
              <img src="<?php echo get_the_post_thumbnail_url($publication_post_1_id); ?>" alt="" class="img-fluid">
              <div class="publication-info">
                <h3><?php echo get_the_title($publication_post_1_id); ?></h3>
                <h4> <?php echo $author; ?></h4>
                <p><?php echo get_the_excerpt($publication_post_1_id); ?></p>
              </div>
              <a href="<?php echo get_the_permalink($publication_post_1_id);?>" class="button primary"> Mehr Erfahren </a>
            </div>
            <div class="publication-wrapper col-12 col-lg-6"> <?php
              $publication_post_2_id = get_sub_field('publication_post_2_id'); 
              $author = get_field('author', $publication_post_2_id);?>
              <img src="<?php echo get_the_post_thumbnail_url($publication_post_2_id); ?>" alt="" class="img-fluid">
              <div class="publication-info">
                <h3><?php echo get_the_title($publication_post_2_id); ?></h3>
                <h4> <?php echo $author; ?></h4>
                <p><?php echo get_the_excerpt($publication_post_2_id); ?></p>
              </div>
              <a href="<?php echo get_the_permalink($publication_post_2_id);?>" class="button primary"> Mehr Erfahren </a>
            </div>
            <div class="button-wrapper col-12 offset-lg-5 col-lg-7">
              <a href="<?php bloginfo('url'); ?>/publikationen" class="button secondary"> Alle Publikationen</a>
            </div>
          </div>
        </div>
        <?php
      } 
    }
    endwhile;
  }
}
?>