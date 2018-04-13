<?php $social_list =& $data; /* @var $social_list Social[] */ ?>


<div class="social-bar">
    <?php foreach ($social_list as $social): // Procházení jednotlivých profilů na sociálních sítích...
      Rychecky::view('socialbar.single', $social);
    endforeach; ?>
</div>