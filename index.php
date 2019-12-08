<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
    the_post(); 
    get_template_part('components/sub-header');
    
    if (!$is_single) {
      get_template_part('posts/default-post');
    }
  }

}
?>

<?php get_footer(); ?>