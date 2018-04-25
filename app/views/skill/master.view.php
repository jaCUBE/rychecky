<?php $skill_list =& $data['skill_list'];
/* @var $skill_list Skill[] */ // Seznam dovedností ve zvolené skupině?>
<?php $skill_stats =& $data['skill_stats']; // Statistiky skupin dovedností?>


<h2>
    <i class="fa fa-database"></i> <?= e('Dovednosti', 'Skills') ?>
</h2>


<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <?php foreach ($skill_stats as $type => $count) { // Procházení jednotlivých skupin dovedností...?>
                <a href="<?= URL ?>/skills/<?= make_css_name($type) ?>"
                   class="list-group-item <?= SkillListType::isSelectedType($type) ? 'active' : '' ?>">
                    <?= $type // Název skupiny   ?>
                    <span class="badge badge-light">
            <?= $count // Počet dovedností ve skupině   ?>
          </span>
                </a>
                <?php
            } ?>
        </div>
    </div>


    <div class="col-md-9">
        <?php foreach ($skill_list as $skill): // Procházení jednotlivých skupin dovedností...
            Rychecky::view('skill.single', $skill);
        endforeach; ?>
    </div>
</div>