<?php $skill =& $data; /* @var $skill Skill */ ?>


<div class="skill">
    <div class="name">
        <?= $skill->name ?>
    </div>

    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?= $skill->value ?>%;">
        </div>
    </div>

    <div class="detail">
        <?= $skill->detail ?>
    </div>
</div>