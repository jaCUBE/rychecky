<?php

include 'bootstrap.php';

$cl = new CertificateList();

$output = [];

foreach($cl->certificate_list as $c){ /* @var $c Certificate */
  $one = [];
  $one['type'] = 'blog_post';
  $one['date'] = date('Y-m-d', strtotime($c->issue_date));
  $one['title'] = $c->name;
  
  ob_start(); ?>


  <div class="certificate-timeline">
    <div class="name">
      <?= $c->name; ?>
    </div>
    <div class="issue-by">
      <?= $c->issue_by ?>
    </div>
  </div>


  <?php 
  
  $one['content'] = ob_get_clean();
 
  $output[] = $one;
}


echo json_encode($output);