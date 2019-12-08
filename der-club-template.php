<?php
/*
Template Name: Der Club Template
*/

get_header();
?>

  <?php get_template_part('components/sub-header'); ?>

  <div class="hero">
    <div class="hero-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/muschel.png)">

    </div>
    <div class="mission-statement-block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-11 col-xl-9">
            <?php
            $intro_text = get_field('intro_text');
            if ($intro_text) { ?>
              <p> <?php echo $intro_text; ?></p> <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_template_part('components/member-list'); ?>
  <?php get_template_part('components/goals-list'); ?>
  <?php get_template_part('components/club-themes-list'); ?>
  




<?php get_footer(); ?>