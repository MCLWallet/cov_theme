<div id="themen" class="themes-section">
  <div class="container">
    <div class="row">
      <div class="col-12 heading">
        <h3>Themen</h3>
      </div>
    </div>
  </div>
  <?php
  $society_text = get_field('society_text');
  $economics_text = get_field('economics_text');
  $ecology_text = get_field('ecology_text');
  $tech_text = get_field('tech_text');
  ?>
  <div id="gesellschaft" class="theme-wrapper">

    <div class="theme-background-grid">
      <div class="text">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h4>Gesellschaft</h4>
              <?php
              if ($society_text) { ?>
                <p> <?php echo $society_text; ?> </p>
                <?php
              } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="theme-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/test-image.png)">
        <div class="theme-tile">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/society_icon.png" alt="">
        </div>
      </div>
    </div>

    <div class="container theme-foreground-container">
      <div class="row">
        <div class="col-12 col-lg-5 order-1 text">
          <h4>Gesellschaft</h4>
          <?php
          if ($society_text) { ?>
            <p> <?php echo $society_text; ?> </p>
            <?php
          }
          ?>
        </div>
        <div class="col-12 offset-sm-6 col-sm-6 offset-lg-0 col-lg-4 order-2 theme-tile-wrapper">
          <div class="theme-tile">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/society_icon.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="wirtschaft" class="theme-wrapper">

    <div class="theme-background-grid">
      <div class="text">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h4>Wirtschaft</h4>
              <?php
              if ($economics_text) { ?>
                <p> <?php echo $economics_text; ?> </p>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="theme-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/stone.png)">
        <div class="theme-tile">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/economics_icon.png" alt="">
        </div>
      </div>
    </div>

    <div class="container theme-foreground-container">
      <div class="row">
        <div class="col-12 offset-lg-1 col-lg-5 order-2 text">
          <h4>Wirtschaft</h4>
          <?php
          if ($economics_text) { ?>
            <p> <?php echo $economics_text; ?> </p>
            <?php
          }
          ?>
        </div>
        <div class="col-12 offset-sm-6 col-sm-6 offset-lg-3 col-lg-3 order-1 theme-tile-wrapper">
          <div class="theme-tile">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/economics_icon.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="oekologie" class="theme-wrapper">

    <div class="theme-background-grid">
      <div class="text">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h4>Ökologie</h4>
              <?php
              if ($ecology_text) { ?>
                <p> <?php echo $ecology_text; ?> </p>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="theme-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/flower.png)">
        <div class="theme-tile">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/ecology_icon.png" alt="">
        </div>
      </div>
    </div>

    <div class="container theme-foreground-container">
      <div class="row">
        <div class="col-12 col-lg-5 order-1 text">
          <h4>Ökologie</h4>
          <?php
          if ($ecology_text) { ?>
            <p> <?php echo $ecology_text; ?> </p>
            <?php
          }
          ?>
        </div>
        <div class="col-12 offset-sm-6 col-sm-6 offset-lg-0 col-lg-4 order-2 theme-tile-wrapper">
          <div class="theme-tile">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/ecology_icon.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="technik" class="theme-wrapper">

    <div class="theme-background-grid">
      <div class="text">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h4>Technik</h4>
                <?php
                if ($tech_text) { ?>
                  <p> <?php echo $tech_text; ?> </p>
                  <?php
                }
                ?>
            </div>
          </div>
        </div>
      </div>
      <div class="theme-image" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/cell.png)">
        <div class="theme-tile">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/tech_icon.png" alt="">
        </div>
      </div>
    </div>

    <div class="container theme-foreground-container">
      <div class="row">
        <div class="col-12 offset-lg-1 col-lg-5 order-2 text">
          <h4>Technik</h4>
          <?php
          if ($tech_text) { ?>
            <p> <?php echo $tech_text; ?> </p>
            <?php
          }
          ?>
        </div>
        <div class="col-12 offset-sm-6 col-sm-6 offset-lg-3 col-lg-3 order-1 theme-tile-wrapper">
          <div class="theme-tile">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/tech_icon.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
