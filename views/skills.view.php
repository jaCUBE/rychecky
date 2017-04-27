<?php $sl =& $data; /* @var $data SkillList */ ?>



<h2>
  <i class="fa fa-database"></i> Dovednosti
</h2>



<div class="row">
  <div class="col-md-3">
    <div class="list-group">
      <?php foreach($sl->skill_list as $type => $skill_group){ // Procházení jednotlivých skupin dovedností... ?>
        <a href="<?= $sl->skillTypeUrl($type) ?>"
         class="list-group-item <?= $sl->isSkillTypeSelected($type) ? 'active' : '' // Pokud je skupina zvolená, má třídu active ?>">
          <?= $type // Název skupiny ?>
          <span class="badge">
            <?= $sl->countSkill($type) // Počet dovedností ve skupině ?>
          </span>
        </a>
      <?php } ?>
    </div>
  </div>
  
  
  
  
  
  <div class="col-md-9">
    <?php foreach($sl->skill_list as $type => $skill_group){ // Procházení jednotlivých skupin dovedností... ?>
      <?php if(!$sl->isSkillTypeSelected($type)) continue // Pokud skupina NENÍ zvolená, přeskočí se a jede se dál ?>

        <?php foreach($skill_group as $s){ /* @var $s Skill */ // Procházení jednotlivých dovedností ve zvolené skupině... ?>
          <?= $s->htmlSkill() // Vygenerování HTML boxu jedné dovednosti ?>
        <?php } ?>
    <?php } ?>    
  </div>
</div>