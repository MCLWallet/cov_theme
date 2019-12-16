<?php 
$role = get_field('role');
?>

<div class="container single">
  <div class="row">
    <div class="back-to-overview col-12 col-lg-3">
      <a href="<?php echo bloginfo('url') . '/der-club'; ?>"> 
        <?php get_template_part('assets/svg/arrow_left'); ?>
        Zurück zur Übersicht
      </a>
    </div>
    <div class="single-details press col-12 col-lg-9">
      <h3><?php echo the_title(); ?></h3>
      <h4><?php echo $role; ?></h4>
      
      <?php echo the_content(); ?>

    </div>
  </div>
</div>