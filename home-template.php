<?php
/*
Template Name: Home Template
*/

get_header();
?>



  <!-- Event Hero Section BEGIN -->
  <?php get_template_part('components/hero-section') ?>
  <!-- Event Hero Section END -->

  <!-- Themes Tiles Section BEGIN -->
  <?php get_template_part('components/theme-tiles-section');?>
  <!-- Themes Tiles Section END -->
  
  <!-- Highlight Boxes BEGIN -->
  <?php get_template_part('components/highlight-boxes');?>
  <!-- Highlight Boxes END -->
  


<?php get_footer(); ?>