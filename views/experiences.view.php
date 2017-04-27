<?php $el =& $data; /* @var $data ExperienceList */ ?>



<h2>
  <i class="fa fa-briefcase"></i> Zkušenosti
</h2>


<div id="experiences">
  <div class="row">
    <div class="col-md-4">
      <div id="experiences-timeline"></div>
    </div>    
    
    
    <div class="col-md-8">
      <?php foreach($el->experience_list as $e){ ?>
        <div class="experience <?= $e->cssClass() ?>">
          <div class="title">
            <?= $e->title ?>
          </div>
          <div class="meta">
            <span class="company">
            <?= $e->type == 'Vzdělání' ? '<i class="fa fa-graduation-cap"></i> '.$e->company : '<i class="fa fa-industry"></i> '.$e->company ?>
            </span>            
            <?= $e->htmlExperienceLabel() ?> <?= $e->htmlExperienceDateLabel() ?>
          </div>
          <div class="detail">
            <?= $e->detail ?>
          </div>
          <?= !empty($e->note) ? '<div class="note">'.$e->note.'</div>' : '' ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>