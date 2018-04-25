<?php $certificate = $data['certificate']; /* @var $certificate Certificate */ ?>


<li class="event <?= make_css_name($certificate->type) ?> <?= $i % 2 == 1 ? 'odd' : 'even' // Sudá-lichá událost   ?>"
    data-type="<?= $certificate->type ?>">
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
        <a href="<?= $certificate->url ?>" class="btn btn-sm btn-light">
            <i class="fa fa-globe"></i> <?= e('Certifikát', 'Certificate') ?>
        </a>
    </div>
</li>