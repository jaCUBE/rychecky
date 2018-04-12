<?php $portfolio =& $data; /* @var $data Portfolio */ ?>



<div class="<?= $portfolio->css() ?>" onclick="portfolio(<?= $portfolio->portfolio_id ?>)" <?= $portfolio->htmlData() ?>>
    <div class="image">
        <?= is_a($portfolio->thumbnail, 'Gallery') ? $portfolio->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
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