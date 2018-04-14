<?php $social =& $data; /* @var $social Social */ ?>


<div class="btn-social" style="background: <?= $social->color ?>" title="<?= $social->name ?>"
     onclick="location.assign('<?= $social->url ?>');">
    <i class="fa <?= $social->icon ?>"></i>
</div>