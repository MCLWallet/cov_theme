<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
    the_post(); 
    get_template_part('components/sub-header');

    $post_type = get_post_type();
    switch($post_type) {
      case 'event':
        get_template_part('posts/event-post');
        break;
      case 'project':
        get_template_part('posts/project-post');
        break;
      case 'publication':
        get_template_part('posts/publication-post');
        break;
      case 'press':
        get_template_part('posts/press-post');
        break;
      case 'mitglieder':
        get_template_part('posts/member-post');
        break;
      default:
        get_template_part('posts/default-post');
        break;
    }

	}
}
?>

<?php get_footer(); ?>