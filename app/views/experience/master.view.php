<?php $experience_list =& $data; /* @var $experience_list Experience[] */ ?>



<h2>
  <i class="fa fa-briefcase"></i> <?= e('Zkušenosti', 'Experiences') ?>
</h2>

<div id="experiences">
  <ul class="timeline">
    <?php foreach($experience_list as $i => $experience): // Vykresluje jednotlivé zkušenosti...
      Rychecky::view('experience.single', ['experience' => $experience, 'i' => $i]);
    endforeach; ?>
  </ul>
</div>