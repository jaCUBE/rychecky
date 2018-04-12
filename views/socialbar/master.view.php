<?php $social_list =& $data; /* @var $data Social */ ?>


<div class="social-bar">
    <?php foreach($social_list as $social){ // Procházení jednotlivých profilů na sociálních sítích... ?>
        <?php Rychecky::view('socialbar.single', $social) ?>
    <?php } ?>
</div>