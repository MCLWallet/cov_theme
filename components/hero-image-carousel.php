<div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner"> <?php
    $field_name = '';
    $hero_images = get_field('hero_images');
    // Hero images group loop
    if (have_rows('hero_images')){
      while(have_rows('hero_images')): the_row();
        // prevent active image always starting with 1
        $active_used = false;
        // loop through each hero image
        for ($i = 1; $i < 6; $i++) {
          $field_name = 'hero_image_' . strval($i);
          $hero_image = get_sub_field($field_name);

          if (!empty($hero_image)) { ?>
            <div class="carousel-item <?php echo ($active_used ? '' : 'active'); ?>" data-interval="3000" style="background-image: url(<?php echo $hero_image['url']; ?>)"></div> <?php
            if (! $active_used) {
              $active_used = true; 
            }
          }
        }
      endwhile;
    } ?>
  </div>
</div>