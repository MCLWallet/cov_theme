<?php
  $sub_header_class = 'default';
  // check if current page is the search result page
  $is_search = is_search();
  if (!$is_search) {
    // check if current page is a single post or a page
    $is_single = get_post_type();
    if (get_post_type() == 'event' 
        || get_post_type() == 'project' 
        || get_post_type() == 'publication' 
        || get_post_type() == 'press'
        || get_post_type() == 'mitglieder') { 
      $is_single = true;
    }
    else {
      $is_single = false;
    }
    // check post type or page name for correct sub header color
    
    global $post;
    $post_slug = $post->post_name;
    $post_parent = get_the_title($post->post_parent);
    if (get_post_type() == 'event' || (strpos($post_slug, 'veranstaltungen') || $post_slug == 'veranstaltungen')) {
      $sub_header_class = 'events';
    }
    else if (get_post_type() == 'publication' || $post_slug == 'publikationen') {
      $sub_header_class = 'publications';
    }
    else if (get_post_type() == 'project' || $post_slug == 'projekte') {
      $sub_header_class = 'projects';
    }
    else if ($post_slug == 'wiener-rupert-riedl-preis' || $post_parent == 'Wiener Rupert-Riedl-Preis') {
      $sub_header_class = 'rupert-riedl';
    }
  }
?>

<div class="sub-header <?php echo $sub_header_class; ?>">
  <div class="container">
    <div class="row">
      <div class="breadcrumbs col-12">
        <a href="<?php bloginfo('url'); ?>">Home</a>
        >
        <?php
        if ($is_search) { 
          $search_word = get_search_query(true); ?>
          <a href="<?php echo bloginfo('url') . '/?s=' . $search_word; ?>"> <?php echo 'Suche: ' . $search_word; ?></a> 
          <?php
        }
        else {
          if ($is_single) { 
            if (get_post_type() == 'mitglieder') {
              ?>
              <a href="<?php echo bloginfo('url') . '/der-club'; ?>">Der Club</a> 
              >
              <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
              <?php
            }
            else {
              ?>
              <a href="<?php echo bloginfo('url') . '/' . get_post_type(); ?>"><?php echo get_post_type(); ?></a> 
              >
              <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
              <?php
            }
          }
          else { 
            if ($sub_header_class == 'rupert-riedl') {
              if ($post_slug == 'wiener-rupert-riedl-preis') { ?>
                <a href="<?php echo bloginfo('url') . '/' . get_post_type(); ?>"><?php echo $post_slug; ?></a> <?php
              }
              else { ?>
                <a href="<?php echo bloginfo('url') . '/wiener-rupert-riedl-preis'; ?>">Wiener Rupert-Riedl-Preis</a>
                >
                <a href="<?php get_permalink($post); ?>"><?php echo get_the_title($post); ?></a> <?php
              }
            }
            else { ?>
              <a href="<?php echo bloginfo('url') . '/' . get_post_type(); ?>"><?php echo $post_slug; ?></a> <?php
            }
          }
        } ?>
      </div>
      <div class="page-title col-12">
        <?php
        if ($is_search) { ?>
          <h2>Suche</h2> <?php
        }
        else {
          if ($is_single) { 
            if (get_post_type() == 'mitglieder') { ?>
              <h2>Der Club</h2>
            <?php
            }
            else {
              ?>
              <h2><?php echo get_post_type(); ?> </h2> <?php  
            }
          }
          else { 
            if ($sub_header_class == 'rupert-riedl') { ?>
              <h2> Wiener Rupert-Riedl-Preis </h2> <?php
            }
            else { ?>
              <h2><?php echo the_title(); ?> </h2> <?php
            }
          }
        }
        ?>
      </div>
      <?php
      if (!$is_search) { ?>
        <div class="sub-menu col-12"> <?php
        if (get_post_type() == 'event' || (strpos($post_slug, 'veranstaltungen') || $post_slug == 'veranstaltungen'))  {  ?>
          <ul>
            <li>
              <a href="<?php echo bloginfo('url'); ?>/aktuelle-veranstaltungen">Aktuelle Veranstaltungen</a>
            </li>
            <li>
              <a href="<?php echo bloginfo('url'); ?>/vergangene-veranstaltungen">Vergangene Veranstaltungen</a>
            </li>
          </ul>
          <?php
        }
        else if ($post_slug == 'wiener-rupert-riedl-preis' || $post_parent == 'Wiener Rupert-Riedl-Preis') { ?>
          <ul>
            <li>
              <a href="<?php echo bloginfo('url'); ?>/wiener-rupert-riedl-preis/bewerbung">Bewerbung</a>
            </li>
            <li>
              <a href="<?php echo bloginfo('url'); ?>/wiener-rupert-riedl-preis/preistragerinnen">PreisträgerInnen</a>
            </li>
            <li>
              <a href="<?php echo bloginfo('url'); ?>/wiener-rupert-riedl-preis/preisverleihungen">Preisverleihungen</a>
            </li>
          </ul>
        <?php
        }
        else if ($post_slug == 'der-club') { ?>
          <ul>
            <li>
              <a href="<?php echo the_permalink(); ?>#vorstand">Vorstand</a>
            </li>
            <li>
              <a href="<?php echo the_permalink(); ?>#mitglieder">Mitglieder</a>
            </li>
            <li>
              <a href="<?php echo the_permalink(); ?>#ziele">Ziele</a>
            </li>
            <li>
              <a href="<?php echo the_permalink(); ?>#themen">Themen</a>
            </li>
          </ul>
          <?php
        }
        ?>
      </div> <?php
      } ?>
    </div>
  </div>
</div>