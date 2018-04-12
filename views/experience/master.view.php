<?php $experience_list =& $data; /* @var $data Experience */ ?>



<h2>
  <i class="fa fa-briefcase"></i> <?= e('Zkušenosti', 'Experiences') ?>
</h2>

<div id="experiences">
  <ul class="timeline">
    <?php foreach($experience_list as $i => $experience){ ?>
        <?php Rychecky::view('experience.single', ['experience' => $experience, 'i' => $i]) ?>
    <?php } ?>
  </ul>
</div>