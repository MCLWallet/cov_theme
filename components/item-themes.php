<?php
$categories = get_the_category();
$category_names = Array();
foreach($categories as $category) {
  $category_names[] = $category->name;
}
?>
<div class="themes"> <?php
  // check categories for rendering theme icons
  // Gesellschaft
  if (in_array('Gesellschaft', $category_names, true)) {
    get_template_part('assets/svg/society_icon_darkblue');
  }
  // Wirtschaft
  if (in_array('Wirtschaft', $category_names, true)) {
    get_template_part('assets/svg/economy_icon_darkblue');
  }
  // Ecology
  if (in_array('Ökologie', $category_names, true)) {
    get_template_part('assets/svg/ecology_icon_darkblue');
  }
  // Tech
  if (in_array('Technik', $category_names, true)) {
    get_template_part('assets/svg/tech_icon_darkblue');
  }
  ?>
</div>