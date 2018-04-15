<?php $portfolio =& $data; /* @var $portfolio Portfolio */ ?>


<div class="row portfolio-modal">
    <div class="col-md-4">
        <div class="label" style="margin-bottom: 5px;">
            <?= $portfolio->isInteresting() ? '<span class="badge badge-info"><i class="fa fa-star"></i> Zajímavá položka</span>' : '' ?>
            <?= $portfolio->isRunning() ? '<span class="badge badge-success"><i class="fa fa-cog"></i> Ve vývoji</span>' : '' ?>
        </div>

        <div class="center">
            <div class="image">
                <img src="<?= Gallery::portfolioThumbnail($portfolio->portfolio_id)->url() // URL thumbnailu    ?>"
                     alt=""/>
            </div>
        </div>


        <div class="gallery">
            <?php foreach (Gallery::portoflioGallery($portfolio->portfolio_id) as $image) { ?>
                <a href="<?= $image->url() ?>" data-fancybox="portfolio-<?= $portfolio->portfolio_id ?>"
                   data-caption="<?= htmlspecialchars($image->title) ?>" class="fancybox">
                    <img src="<?= $image->url() ?>" alt=""/>
                </a>
            <?php } ?>
        </div>
    </div>


    <div class="col-md-8">
        <div class="detail">
            <div class="text">
                <?= $portfolio->detail ? $portfolio->detail : $portfolio->detail_short // Popis portfolio    ?>
            </div>

            <div class="center">
                <div class="url">
                    <?= $portfolio->url ? '<a href="' . $portfolio->url . '" class="btn btn btn-light"><i class="fa fa-globe"></i> ' . $portfolio->nameShortest() . '</a>' : '' ?>
                </div>

                <?= $portfolio->github ? '<a href="' . $portfolio->github . '" class="btn btn-sm btn-secondary"><i class="fa fa-github"></i> ' . $portfolio->nameShortest() . ' GitHub</a>' : '' ?>
            </div>
        </div>
    </div>
</div>