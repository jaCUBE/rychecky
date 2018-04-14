<?php $portfolio =& $data; /* @var $portfolio Portfolio */ ?>


<div class="portfolio
     <?= make_css_name($portfolio->type) ?>
     <?= $portfolio->isInteresting() ? 'interesting' : '' // CSS třída zajímavé položky ?>
     <?= $portfolio->isRunning() ? 'running' : '' // CSS třída položky ve vývoji ?>"
     data-age="<?= $portfolio->age() ?>"
     data-name="<?= replace_czech_characters($portfolio->nameShortest()) ?>"
     data-size="<?= $portfolio->size * -1 ?>"
     onclick="portfolio(<?= $portfolio->portfolio_id ?>)">

    <div class="image">
        <?= is_a($portfolio->thumbnail,
            'Gallery') ? $portfolio->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
    </div>

    <div class="info">
        <div class="name">
            <?= $portfolio->nameShortest() ?>

            <?= $portfolio->isInteresting() ? '<i class="fa fa-star" title="Zajímavá položka"></i>' : '' ?>
            <?= $portfolio->isRunning() ? '<i class="fa fa-cog" title="Položka stále ve vývoji"></i>' : '' ?>
        </div>

        <div class="detail">
            <?= $portfolio->detail_short ?>
        </div>
    </div>
</div>