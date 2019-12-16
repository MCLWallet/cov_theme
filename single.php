<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
    the_post(); 
    get_template_part('components/sub-header');

    $post_type = get_post_type();
    switch($post_type) {
      case 'veranstaltungen':
        get_template_part('posts/event-post');
        break;
      case 'projekte':
        get_template_part('posts/project-post');
        break;
      case 'publikationen':
        get_template_part('posts/publication-post');
        break;
      case 'presse':
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