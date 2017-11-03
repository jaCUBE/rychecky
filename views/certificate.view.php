<?php $cl =& $data; /* @var $data CertificateList */ ?>



<h2>
  <i class="fa fa-certificate"></i> <?= e('Certifikace', 'Certificates') ?>
</h2>


<div id="certificate">
  <ul class="timeline">
    <?php foreach($cl->certificate_list as $i => $c){ ?>
      <li class="event <?= Rychecky::makeCssName($c->type) ?> <?= $i % 2 == 1 ? 'odd' : 'even' // Sudá-lichá událost ?>" data-type="<?= $c->type ?>">
        <div class="date">
          <span class="start"><?= date('n/Y', strtotime($c->issue_date)) ?></span>
        </div>
        
        <div class="title"><?= $c->name ?></div>
        
        <div class="company">
          <i class="fa fa-certificate"></i> <?= $c->issue_by ?>
        </div>
        
        <div class="detail"><?= $c->detail ?></div>
        
        <div class="center">
          <a href="<?= $c->url ?>" class="btn btn-xs btn-default">
            <i class="fa fa-globe"></i> <?= e('Certifikát', 'Certificate') ?>
          </a>
        </div>
      </li>    
    <?php } ?>
  </ul>
</div>