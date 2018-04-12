<?php $portfolio_list =& $data; /* @var $data Portfolio */ ?>



<h2>
  <i class="fa fa-bookmark"></i> Portfolio
</h2>

<div class="row portfolio-menu">
  <div class="col-md-6">
    <div class="btn-label"><i class="fa fa-filter"></i> <?= e('Filtr', 'Filter') ?>:</div>
    <div id="filters" class="btn-group">
      <div class="btn btn-sm btn-light" data-filter="*"><i class="fa fa-th-list"></i> <?= e('Vše', 'All') ?></div>
      <div class="btn btn-sm btn-dark" data-filter=".profesionalni"><i class="fa fa-briefcase"></i> <?= e('Profesionální', 'Professional') ?></div>
      <div class="btn btn-sm btn-dark" data-filter=".osobni"><i class="fa fa-user"></i> <?= e('Osobní', 'Personal') ?></div>
      <div class="btn btn-sm btn-dark" data-filter=".interesting"><i class="fa fa-star"></i> <?= e('Zajímavé', 'Interesting') ?></div>
      <div class="btn btn-sm btn-dark" data-filter=".running"><i class="fa fa-cog"></i> <?= e('Ve vývoji', 'Under Development') ?></div>
    </div>
  </div>
  
  
  
  <div class="col-md-6">
    <div class="btn-label"><i class="fa fa-sort-alpha-asc"></i> <?= e('Řazení', 'Sorting') ?>:</div>
    <div id="sorts" class="btn-group">
      <div class="btn btn-sm btn-light" data-sort-by="size"><i class="fa fa-sort-amount-desc"></i> <?= e('Rozsah', 'Size') ?></div>
      <div class="btn btn-sm btn-dark" data-sort-by="name"><i class="fa fa-sort-alpha-asc"></i> <?= e('Název', 'Name') ?></div>
      <div class="btn btn-sm btn-dark" data-sort-by="age"><i class="fa fa-history"></i> <?= e('Stáří', 'Age') ?></div>
    </div>
  </div>
</div>





<div class="isotope">
  <?php foreach($portfolio_list as $i => $portfolio){ ?>
    <?php Rychecky::view('portfolio.single', $portfolio) ?>
  <?php } ?>
</div>