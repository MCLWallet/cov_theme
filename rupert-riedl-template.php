<?php
/*
Template Name: Rupert Riedl Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <?php
  $post_slug = $post->post_name;
  if ($post_slug == 'wiener-rupert-riedl-preis') { ?>
    <div class="hero">
      <div class="hero-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/rupert_riedl.png)">

      </div>
      <div class="mission-statement-block">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-11 col-xl-9"> <?php
              $wrrp_intro_text = get_field('wrrp_intro_text'); ?>
              <p><?php echo $wrrp_intro_text; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div> <?php
  } ?>
  <div class="container default-post list">
    <div class="row">
      <div class="col-12"> <?php 
        if (have_posts()) {
          while (have_posts()) : the_post();
            the_content();
          endwhile;
        } ?>
      </div>
    </div>
  </div>


<?php get_footer(); ?>