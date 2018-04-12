<?php

include '../../bootstrap.php';

$output = [];

$p = new Portfolio($_GET['portfolio_id']);
$p->fetchPortfolioGallery();

ob_start(); ?>






<div class="row portfolio-modal">
  <div class="col-md-4">
    <div class="label" style="margin-bottom: 5px;">
      <?= $p->isInteresting() ? '<span class="badge badge-info"><i class="fa fa-star"></i> Zajímavá položka</span>' : '' ?>
      <?= $p->isRunning() ? '<span class="badge badge-success"><i class="fa fa-cog"></i> Ve vývoji</span>' : '' ?>
    </div>

    <div class="image">
      <?= is_a($p->thumbnail, 'Gallery') ? $p->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
    </div>

    <div class="gallery">
      <?php foreach($p->gallery as $g){ ?>
        <?= $g->htmlFancybox() ?>
      <?php } ?>
    </div>
  </div>


  <div class="col-md-8">
    <div class="detail">
      <div class="text">
        <?= $p->detail ? $p->detail : $p->detail_short // Popis portfolio ?>
      </div>

      <div class="center">
        <div class="url">
          <?= $p->url ? '<a href="'.$p->url.'" class="btn btn btn-light"><i class="fa fa-globe"></i> '.$p->nameShortest().'</a>' : '' ?>
        </div>

        <?= $p->github ? '<a href="'.$p->github.'" class="btn btn-sm btn-secondary"><i class="fa fa-github"></i> '.$p->nameShortest().' GitHub</a>' : '' ?>
      </div>
    </div>
  </div>
</div>




<?php

$output['title'] = $p->name;
$output['body'] = ob_get_clean();

echo json_encode($output);