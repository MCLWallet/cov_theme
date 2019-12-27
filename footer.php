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
    <!-- Mobile Footer -->
    <div id="mobile-footer" class="mobile-footer">
      <div class="social-media-links"> <?php
        $facebook_link = do_shortcode('[pods name="footer" slug="facebook_page" field="facebook_page"]');
        if ($facebook_link) { ?>
          <div class="icon-wrapper"> 
            <a href="<?php echo $facebook_link;?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/facebook_icon.png" id="facebook-icon" alt="Link to Club Of Vienna Facebook Page">
            </a> 
          </div> <?php
        }
        $youtube_link = do_shortcode('[pods name="footer" slug="youtube_page" field="youtube_page"]');
        if ($youtube_link) { ?>
          <div class="icon-wrapper"> 
            <a href="<?php echo $youtube_link;?>">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/youtube_icon.png" id="youtube-icon" alt="Link to Club Of Vienna YouTube Page">
            </a> 
          </div> <?php
        } ?>
      </div>
      <div class="footer-address"> 
        <p> <?php
          $footer_address = do_shortcode('[pods name="footer" slug="footer_address" field="footer_address"]');
          $footer_email_address = do_shortcode('[pods name="footer" slug="footer_email_address" field="footer_email_address"]');
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
                <p><strong>Club Of Vienna</strong> <?php
                  if ($footer_address) {
                    echo $footer_address;
                  } ?>
                </p> <?php
                if ($footer_email_address) { ?>
                  <a href="mailto:<?php echo $footer_email_address ?>"><?php echo $footer_email_address ?></a>
                <?php
                } ?>
              </div>
              <div class="social-media-links"> <?php
                if ($facebook_link) { ?>
                  <div class="icon-wrapper"> 
                    <a href="<?php echo $facebook_link;?>">
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/facebook_icon.png" id="facebook-icon" alt="Link to Club Of Vienna Facebook Page">
                    </a> 
                  </div> <?php
                } 
                if ($youtube_link) { ?>
                  <div class="icon-wrapper"> 
                    <a href="<?php echo $youtube_link;?>">
                      <img src="<?php bloginfo('template_url'); ?>/assets/img/youtube_icon.png" id="youtube-icon" alt="Link to Club Of Vienna YouTube Page">
                    </a> 
                  </div> <?php
                } ?>
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
          <?php
          $newsletter_shortcode = do_shortcode('[pods name="footer" slug="newsletter_shortcode" field="newsletter_shortcode"]');
          if ($newsletter_shortcode) { ?>
            <div class="newsletter-register order-1 order-sm-1 order-md-1 order-lg-3 col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <p>Tragen Sie sich hier für den Newsletter ein, um immer auf dem neuesten Stand zu bleiben:</p><?php
              echo do_shortcode($newsletter_shortcode); ?>
            </div> <?php
          }
          ?>
          
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
