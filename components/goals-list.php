<div id="ziele" class="container goals">
  <div class="row">
    <div class="col-12 heading">
      <h3>Ziele</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12 sub-heading">
      <h3>Die Grundlagen der Arbeit des Club Of Vienna</h3>
    </div>
    <div class="col-12 goals-wrapper"> <?php
      $goal_1 = get_field('goal_1');
      $goal_2 = get_field('goal_2');
      $goal_3 = get_field('goal_3');
      $goal_4 = get_field('goal_4');
      $goal_5 = get_field('goal_5');
      $goal_text = get_field('goal_text');
  
      if ($goal_1) { ?>
        <div class="goal">
          <div class="number">
            <span>1</span>
          </div>
          <div class="text">
            <?php echo $goal_1; ?>
          </div>
        </div> <?php
      }
      ?>
      <?php
      if ($goal_2) { ?>
        <div class="goal">
          <div class="number">
            <span>2</span>
          </div>
          <div class="text">
            <?php echo $goal_2; ?>
          </div>
        </div> <?php
      }
      ?>
      <?php
      if ($goal_3) { ?>
        <div class="goal">
          <div class="number">
            <span>3</span>
          </div>
          <div class="text">
            <?php echo $goal_3; ?>
          </div>
        </div> <?php
      }
      ?>
      <?php
      if ($goal_4) { ?>
        <div class="goal">
          <div class="number">
            <span>4</span>
          </div>
          <div class="text">
            <?php echo $goal_4; ?>
          </div>
        </div> <?php
      }
      ?>
      <?php
      if ($goal_5) { ?>
        <div class="goal">
          <div class="number">
            <span>5</span>
          </div>
          <div class="text">
            <?php echo $goal_5; ?>
          </div>
        </div> <?php
      }
      ?>
    </div>
    <div class="col-12 sub-heading">
      <h3>Die Ziele des Club of Vienna</h3>
    </div>
    <div class="col-12">
      <?php
      if ($goal_text) {
        echo $goal_text;
      } 
      ?>
    </div>

  </div>
</div>