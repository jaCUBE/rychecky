<?php $certificate = $data['certificate']; /* @var $certificate Objekt certifikátu */ ?>



<li class="event <?= Rychecky::makeCssName($certificate->type) ?> <?= $i % 2 == 1 ? 'odd' : 'even' // Sudá-lichá událost ?>" data-type="<?= $certificate->type ?>">
    <div class="date">
        <span class="start"><?= date('n/Y', strtotime($certificate->issue_date)) ?></span>
    </div>

    <div class="title">
        <?= $certificate->name ?>
    </div>

    <div class="company">
        <i class="fa fa-certificate"></i> <?= $certificate->issue_by ?>
    </div>

    <div class="detail"><?= $certificate->detail ?></div>

    <div class="center">
        <a href="<?= $certificate->url ?>" class="btn btn-xs btn-default">
            <i class="fa fa-globe"></i> <?= e('Certifikát', 'Certificate') ?>
        </a>
    </div>
</li>