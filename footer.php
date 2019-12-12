    <?php
      // Get Footer Data
      $footer_menu_left = array(
        'container_id' => 'sitemap-left',
        'container_class' => 'sitemap',
        'theme_location' => 'footer-menu-left');
      $footer_menu_right = array(
        'container_id' => 'sitemap-right',
        'container_class' => 'sitemap',
        'theme_location' => 'footer-menu-right');
      $mobile_footer_menu = array(
        'container_id' => 'sitemap-mobile',
        'container_class' => 'sitemap',
        'theme_location' => 'mobile-footer-menu');
    ?>
    </div>
    <div id="mobile-footer" class="mobile-footer">
      <div class="social-media-links">
        <div class="icon-wrapper"> <?php
          $facebook_link = get_field('facebook_link');
          if ($facebook_link) { ?>
            <a href="<?php echo $facebook_link;?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/facebook_icon.png" id="facebook-icon" alt="Link to Club Of Vienna Facebook Page">
            </a> <?php
          } ?>
        </div>
        <div class="icon-wrapper"> <?php
          $youtube_link = get_field('youtube_link');
          if ($youtube_link) { ?>
            <a href="<?php echo $youtube_link;?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/youtube_icon.png" id="youtube-icon" alt="Link to Club Of Vienna YouTube Page">
            </a> <?php
          } ?>
        </div>
      </div>
      <div class="footer-address"> 
        <p> <?php
          $footer_address = get_field('footer_address');
          $footer_email_address = get_field('footer_email_address');
          if ($footer_address) {
            echo $footer_address;
          }
          if ($footer_email_address) { ?>
            </br>
            <a href="mailto:<?php echo $footer_email_address ?>"><?php echo $footer_email_address ?></a> <?php
          } ?>
        </p>
      </div>
    </div>
    <!-- Footer -->
    <footer id="footer" class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-info order-2 order-sm-2 order-md-2 order-lg-1 col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="logo-contact-wrapper">
              <div class="logo-wrapper-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/COV_Logo.png" class="cov-logo-img" alt="Club Of Vienna logo">
                <h1> Club </br>Of</br> Vienna</h1>
              </div>
              <div class="footer-address">
                <p><strong>Club Of Vienna</strong></br> <?php
                  if ($footer_address) {
                    echo $footer_address;
                  } ?>
                </p> <?php
                if ($footer_email_address) { ?>
                  <a href="mailto:<?php echo $footer_email_address ?>"><?php echo $footer_email_address ?></a>
                <?php
                } ?>
              </div>
              <div class="social-media-links">
                <div class="icon-wrapper"> <?php
                  if ($facebook_link) { ?>
                    <a href="<?php echo $facebook_link;?>">
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/facebook_icon.png" id="facebook-icon" alt="Link to Club Of Vienna Facebook Page">
                    </a> <?php
                  } ?>
                </div>
                <div class="icon-wrapper"> <?php
                  if ($youtube_link) { ?>
                    <a href="<?php echo $youtube_link;?>">
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/youtube_icon.png" id="youtube-icon" alt="Link to Club Of Vienna YouTube Page">
                    </a> <?php
                  } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="sitemap-column order-3 order-sm-3 order-md-3 order-lg-2 col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="sitemap-wrapper left">
              <?php wp_nav_menu($footer_menu_left); ?>
              <?php //wp_nav_menu($mobile_footer_menu); ?>
            </div>
            <div class="sitemap-wrapper right">
              <?php wp_nav_menu($footer_menu_right); ?>
              <div class="stadt-wien">
                <p>Gefördert durch:</p>
                <img src="<?php bloginfo('template_url'); ?>/assets/img/stadt_wien_logo_a.png" alt="Stadt Wien Logo" class="stadt-wien-logo">
              </div>
            </div>
            
          </div>
          <div class="newsletter-register order-1 order-sm-1 order-md-1 order-lg-3 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <p>Tragen Sie sich hier für den Newsletter ein, um immer auf dem neuesten Stand zu bleiben:</p>
            <?php
            $newsletter_shortcode = get_field('newsletter_shortcode');
            echo newsletter_shortcode;
            ?>
            <!-- <form id="newsletter-registration-footer" action="" method="post">
              <input id="first-name" type="text" placeholder="Vorname">
              <input id="last-name" type="text" placeholder="Nachname">
              <input id="email" type="email" placeholder="E-Mail Adresse" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required>
              <input id="terms" type="checkbox">
              <label class="terms" for="terms">
                Ja, ich möchte den CLUB OF VIENNA Newsletter abonnieren. Die erteilte Einwilligung können Sie jederzeit kostenlos widerrufen. Details zur Datenverarbeitung durch CLUB OF VIENNA sowie zu Ihren Rechten als Betroffener finden Sie in der  <a href="#"> Datenschutzerklärung </a>.
              </label>
              <button type="submit">Absenden</button>
            </form> -->
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
