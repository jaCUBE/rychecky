<?php

include 'bootstrap.php';

$el = new ExperienceList();

$output = [];

foreach($el->experience_list as $e){
  if($e->timeline == 0) continue;
  
  $one = [];
  $one['type'] = 'blog_post';
  $one['date'] = date('Y-m-d', strtotime($e->date_start));
  $one['title'] = $e->title;
  
  ob_start(); ?>


  <div class="experience-timeline">
    <div class="name">
      <?= $e->title ?>
    </div>
    <div class="company">
      <?= $e->type == 'Vzdělání' ? '<i class="fa fa-graduation-cap"></i> '.$e->company : '<i class="fa fa-industry"></i> '.$e->company ?>
    </div>
  </div>


  <?php 
  
  $one['content'] = ob_get_clean();
 
  $output[] = $one;
}


echo json_encode($output);