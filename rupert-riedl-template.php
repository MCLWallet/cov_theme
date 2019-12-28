<?php
/*
Template Name: Rupert Riedl Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="hero">
    <div class="hero-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/rupert_riedl.png)">

    </div>
    <div class="mission-statement-block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-11 col-xl-9"> <?php
            $wrrp_intro_text = do_shortcode('[pods name="wiener_rupert-riedl-preis" slug="intro_text" field="intro_text"]'); ?>
            <?php echo $wrrp_intro_text; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $application_content = get_field('application_content');
  $winners_content = get_field('winners_content');
  $ceremonies_content = get_field('ceremonies_content'); ?>

  <div class="container default-post list">
    <div class="row">
      <div class="col-12"> <?php 
        if (have_posts()) {
          while (have_posts()) : the_post();
            the_content();
          endwhile;
        }
        ?>
      </div>
    </div>
  </div>


<?php get_footer(); ?>