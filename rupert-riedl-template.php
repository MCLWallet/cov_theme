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
          <div class="col-12 col-lg-11 col-xl-9">
            <p> Rupert Riedl ist der Gründungspräsident des Club of Vienna. Zur Ehrung seiner Persönlickeit vergibt der Club of Vienna seit 2002 den Wiener Rupert-Riedl-Preis. Die nächste Ausschreibung findet im Jänner 2018 statt. Nähere Infos finden Sie auf unserer Homepage. </p>
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
    <div class="col-12">
      <div id="bewerbung">
        <?php echo $application_content; ?>
      </div>
      <div id="preistraegerinnen">
        <?php echo $winners_content; ?>
      </div>
      <div id="preisverleihungen">
        <?php echo $ceremonies_content; ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>