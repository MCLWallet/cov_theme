<?php
/******************/
/*** FUNCTIONS ****/
/******************/
/*
* Loads CSS/JS resources neccessary for the Club Of Vienna theme
*/
function club_of_vienna_resources() {
  wp_enqueue_script('jquery', get_template_directory_uri() . '/dependencies/jquery/jquery-3.4.1.min.js', null, 1.2, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/dependencies/bootstrap/bootstrap.min.js');
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dependencies/bootstrap/bootstrap.min.css');
  wp_enqueue_style('styles', get_stylesheet_uri());
  wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', null, null, true);
}

/*
* Registering the Menus
*/
function register_my_menus() {
  $menu_array = array(
    'header-menu' => __('Header Menu'),
    'footer-menu-left' => __('Footer Menu Links'),
    'footer-menu-right' => __('Footer Menu Rechts'),
    'mobile-menu' => __('Mobile Menu'),
    'mobile-footer-menu' => __('Mobile Footer Menu')
  );
  register_nav_menus($menu_array);
}

// Add featured image support
function post_thumbnail_setup() {
  add_theme_support('post-thumbnails');
}

/**
 * Returns the human-readable go-to label from a term
 */
function get_go_to_label($term) {
  switch($term) {
    case 'event':
      return 'Zur Veranstaltung';
    case 'project':
      return 'Zum Projekt';
    case 'publication':
      return 'Zur Publikation';
    case 'press':
      return 'Zum Artikel';
    default:
      return 'Zum Post';
  }
}

function sort_search_query($query) {
  if ($query->is_search()) {
    $query->set('post_type', array('page', 'event', 'project', 'publication', 'press', 'mitglieder'));
    $query->set('orderby', 'post_type');
    $query->set('order', 'DESC');
  }
}

function get_child_categories($parent_category) {
  $categories = get_the_category();
  $first_element = true;

  foreach ($categories as $category) {
    if (cat_is_ancestor_of(get_cat_ID($parent_category), $category)) {
      if ($first_element) {
        echo $category->name;
        $first_element = false;
      }
      else {
        echo ' / ' . $category->name;
      }
    }
  }
}
/**
 * Prepares and returns query for the member lists in "Der Club"
 */
function get_member_query($category_name) {
    $member_category_name = get_category_by_slug($category_name);
    $member_category_term_id = $member_category_name->term_id;
    $args = array( 
      'category__in' => $member_category_term_id,
      'post_type' => array('mitglieder'),
      'posts_per_page' => -1
    );
    return new WP_Query($args);
  }

/***********************/
/*** FUNCTION BINDING **/
/***********************/
add_action('wp_enqueue_scripts', 'club_of_vienna_resources');
add_action('init', 'register_my_menus');
add_action('after_setup_theme', 'post_thumbnail_setup');
add_action('pre_get_posts', 'sort_search_query');
add_filter('use_block_editor_for_post', '__return_false', 10);
?>
