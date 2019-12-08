<?php
  $sub_header_class = 'default';
  // check if current page is the search result page
  $is_search = is_search();
  if (!$is_search) {
    // check if current page is a single post or a page
    $is_single = get_post_type();
    if (get_post_type() == 'veranstaltungen' || get_post_type() == 'projekte' || get_post_type() == 'publikationen' || get_post_type() == 'presse') { 
      $is_single = true;
    }
    else {
      $is_single = false;
    }
    // check post type or page name for correct sub header color
    
    global $post;
    $post_slug = $post->post_name;
    if (get_post_type() == 'veranstaltungen' || (strpos($post_slug, 'veranstaltungen') || $post_slug == 'veranstaltungen')) {
      $sub_header_class = 'events';
    }
    else if (get_post_type() == 'publikationen' || $post_slug == 'publikationen') {
      $sub_header_class = 'publications';
    }
    else if (get_post_type() == 'projekte' || $post_slug == 'projekte') {
      $sub_header_class = 'projects';
    }
    else if ($post_slug == 'wiener-rupert-riedl-preis') {
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
          if ($is_single) { ?>
            <a href="<?php echo bloginfo('url') . '/' . get_post_type(); ?>"><?php echo get_post_type(); ?></a> 
            >
            <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
            <?php
          }
          else { ?>
            <a href="<?php echo bloginfo('url') . '/' . get_post_type(); ?>"><?php echo $post_slug; ?></a>
            <?php
          }
        }
        ?>
        
        
      </div>
      <div class="page-title col-12">
        <?php
        if ($is_search) { ?>
          <h2>Suche</h2> <?php
        }
        else {
          if ($is_single) { ?>
            <h2><?php echo get_post_type(); ?> </h2> <?php
          }
          else { ?>
            <h2><?php echo the_title(); ?> </h2> <?php
          }
        }
        ?>
        
      </div>
      <?php
      if (!$is_search) { ?>
        <div class="sub-menu col-12"> <?php
        if (get_post_type() == 'veranstaltungen' || (strpos($post_slug, 'veranstaltungen') || $post_slug == 'veranstaltungen'))  {  ?>
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
        else if ($post_slug == 'wiener-rupert-riedl-preis') { ?>
          <ul>
            <li>
              <a href="<?php echo the_permalink(); ?>#bewerbung">Bewerbung</a>
            </li>
            <li>
              <a href="<?php echo the_permalink(); ?>#preistraegerinnen">PreisträgerInnen</a>
            </li>
            <li>
              <a href="<?php echo the_permalink(); ?>#preisverleihungen">Preisverleihungen</a>
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