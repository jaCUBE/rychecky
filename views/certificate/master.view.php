<?php $certificate_list =& $data; /* @var $data Certificate */ ?>



<h2>
  <i class="fa fa-certificate"></i> <?= e('Certifikace', 'Certificates') ?>
</h2>


<div id="certificate">
  <ul class="timeline">
    <?php foreach($certificate_list as $i => $certificate){ // Procházení jednotlivých certifikátů... ?>
        <?php Rychecky::view('certificate.single', ['certificate' => $certificate, 'i' => $i]) ?>
    <?php } ?>
  </ul>
</div>