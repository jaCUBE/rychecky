<?php $el =& $data; /* @var $data ExperienceList */ ?>



<h2>
  <i class="fa fa-briefcase"></i> <?= e('Zkušenosti', 'Experiences') ?>
</h2>

<div id="experiences">
  <ul class="timeline">
    <?php foreach($el->experience_list as $i => $e){ ?>
      <li class="event <?= Rychecky::makeCssName($e->type) ?> <?= $i % 2 == 1 ? 'odd' : 'even' // Sudá-lichá událost ?>" data-type="<?= $e->type ?>">
        <div class="date">
          <span class="start"><?= date('n/Y', strtotime($e->date_start)) ?></span>
          –
          <span class="end"><?= $e->date_end ? date('n/Y', strtotime($e->date_end)) : '<em>(nyní)</em>' ?></span>
        </div>
        
        <div class="title"><?= $e->title ?></div>
        
        <div class="company">
          <i class="fa <?= $e->type == 'Zaměstnání' ? 'fa-briefcase' : 'fa-graduation-cap' ?>"></i> 
          <?= $e->company ?>
        </div>
        
        <div class="detail"><?= $e->detail ?></div>
        
        <div class="note"><?= $e->note ?></div>
      </li>    
    <?php } ?>
  </ul>
</div>