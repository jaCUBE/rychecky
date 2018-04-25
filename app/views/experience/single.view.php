<?php $experience =& $data['experience']; /* @var $experience Experience */ ?>


<li class="event <?= make_css_name($experience->type) ?> <?= $i % 2 == 1 ? 'odd' : 'even' // Sudá-lichá událost   ?>"
    data-type="<?= $experience->type ?>">
    <div class="date">
        <span class="start"><?= date('n/Y', strtotime($experience->date_start)) ?></span>
        –
        <span class="end"><?= $experience->date_end ? date('n/Y',
                strtotime($experience->date_end)) : '<em>(nyní)</em>' ?></span>
    </div>

    <div class="title"><?= $experience->title ?></div>

    <div class="company">
        <i class="fa <?= $experience->type == 'Zaměstnání' ? 'fa-briefcase' : 'fa-graduation-cap' ?>"></i>
        <?= $experience->company ?>
    </div>

    <div class="detail"><?= $experience->detail ?></div>

    <div class="note"><?= $experience->note ?></div>
</li>