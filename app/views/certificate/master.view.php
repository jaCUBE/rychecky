<?php $certificate_list =& $data; /* @var $certificate_list Certificate[] */ ?>



<h2>
  <i class="fa fa-certificate"></i> <?= e('Certifikace', 'Certificates') ?>
</h2>


<div id="certificate">
  <ul class="timeline">
    <?php foreach ($certificate_list as $i => $certificate): // Vykresluje jednotlivé certifikáty...
        Rychecky::view('certificate.single', ['certificate' => $certificate, 'i' => $i]);
    endforeach; ?>
  </ul>
</div>