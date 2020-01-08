<div class="container members">
    <div id="vorstand" class="row member-list">
      <div class="col-12">
        <!-- TODO: Member List Refactoring -->
        <h3>Vorstand</h3>
      </div>
      <div class="col-12">
        <div class="row hierarchy-1">
          <?php 
          // President member Query
          $member_query = get_member_query('president');
          if ($member_query->have_posts()) {
            while($member_query->have_posts()): $member_query->the_post();
              $role = get_field('role');
              $member_link = get_field('member_link');
              ?>
              <div class="member-item col-6 col-md-3">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                <a href="<?php echo the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php echo $role; ?></p>
                <?php
                if ($member_link) { ?>
                  <a href="<?php echo $member_link['url']; ?>">
                    <?php echo $member_link['title'] ?>
                    <?php get_template_part('assets/svg/arrow_right'); ?>
                  </a> <?php
                }
                ?>
              </div>
              <?php
            endwhile;
          }
          wp_reset_query();
          ?>
        </div>
      </div>
    </div>
    <div class="row member-list">
      <div class="col-12">
        <h3>Gründungspräsident</h3>
      </div>
      <div class="col-12">
        <div class="row hierarchy-1">
          <?php 
          // President member Query
          $member_query = get_member_query('founder');
          if ($member_query->have_posts()) {
            while($member_query->have_posts()): $member_query->the_post();
              $role = get_field('role');
              $member_link = get_field('member_link');
              ?>
              <div class="member-item col-6 col-md-3">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                <a href="<?php echo the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php echo $role; ?></p>
                <?php
                if ($member_link) { ?>
                  <a href="<?php echo $member_link['url']; ?>">
                    <?php echo $member_link['title'] ?>
                    <?php get_template_part('assets/svg/arrow_right'); ?>
                  </a> <?php
                }
                ?>
              </div>
              <?php
            endwhile;
          }
          wp_reset_query();
          ?>
        </div>
      </div>
    </div>
    <div class="row member-list">
      <div id="mitglieder" class="col-12">
        <h3>Mitglieder</h3>
      </div>
      <div class="col-12">
        <div class="row hierarchy-2">
          <?php 
          // Normal members Query
          $member_query = get_member_query('members');
          if ($member_query->have_posts()) {
            while($member_query->have_posts()): $member_query->the_post();
              $role = get_field('role');
              $member_link = get_field('member_link');
              ?>
              <div class="member-item col-6 col-md-3 col-lg-2">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                <a href="<?php echo the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php echo $role; ?></p>
                <?php
                if ($member_link) { ?>
                  <a href="<?php echo $member_link['url']; ?>">
                    <?php echo $member_link['title'] ?>
                    <?php get_template_part('assets/svg/arrow_right'); ?>
                  </a> <?php
                }
                ?>
              </div>
              <?php
            endwhile;
          }
          wp_reset_query();
          ?>
        </div>
      </div>
    </div>
    <div class="row member-list">
      <div class="col-12">
        <h3>AO. Mitglieder</h3>
      </div>
      <div class="col-12">
        <div class="row hierarchy-3">
          <div class="col-12">
             <?php 
              // AO members Query
              $member_query = get_member_query('ao-member');
              if ($member_query->have_posts()) {
                while($member_query->have_posts()): $member_query->the_post();
                  $role = get_field('role');
                  $member_link = get_field('member_link');
                  ?>
                  <div class="member">
                    <a href="<?php echo the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <?php
                    if ($member_link) { ?>
                      <a href="<?php echo $member_link['url']; ?>">
                        <?php echo $member_link['title'] ?>
                        <?php get_template_part('assets/svg/arrow_right'); ?>
                      </a> <?php
                    }
                    ?>
                  </div>
                  <?php
                endwhile;
              }
              wp_reset_query();
              ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row member-list">
      <div class="col-12">
        <h3>Ehemalige Mitglieder</h3>
      </div>
      <div class="col-12">
        <div class="row hierarchy-3">
          <div class="col-12">
            <?php 
              // Other members Query
              $member_query = get_member_query('other-members');
              if ($member_query->have_posts()) {
                while($member_query->have_posts()): $member_query->the_post();
                  $role = get_field('role');
                  $member_link = get_field('member_link');
                  ?>
                  <div class="member">
                    <a href="<?php echo the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    <?php
                    if ($member_link) { ?>
                      <a href="<?php echo $member_link['url']; ?>">
                        <?php echo $member_link['title'] ?>
                        <?php get_template_part('assets/svg/arrow_right'); ?>
                      </a> <?php
                    }
                    ?>
                  </div>
                  <?php
                endwhile;
              }
              wp_reset_query();
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>