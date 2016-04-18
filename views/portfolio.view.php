<?php /* @var $data PortfolioList */ ?>

<?php $pl =& $data; ?>



<h2>
  <i class="fa fa-bookmark"></i> Portfolio
</h2>



<div class="row portfolio-menu">
  
  
  
  <div class="col-md-6">
    <div class="btn-label"><i class="fa fa-filter"></i> Filtrování:</div>
    <div id="filters" class="btn-group">
      <div class="btn btn-sm btn-success" data-filter="*"><i class="fa fa-th-list"></i> Vše</div>
      <div class="btn btn-sm btn-default" data-filter=".profesionalni"><i class="fa fa-briefcase"></i> Profesionální</div>
      <div class="btn btn-sm btn-default" data-filter=".osobni"><i class="fa fa-user"></i> Osobní</div>
      <div class="btn btn-sm btn-default" data-filter=".interesting"><i class="fa fa-star"></i> Zajímavé</div>
      <div class="btn btn-sm btn-default" data-filter=".running"><i class="fa fa-cog"></i> Ve vývoji</div>
    </div>
  </div>
  
  
  <div class="col-md-6">
    <div class="btn-label"><i class="fa fa-sort-alpha-asc"></i> Řazení:</div>
    <div id="sorts" class="btn-group">
      <div class="btn btn-sm btn-success" data-sort-by="name"><i class="fa fa-sort-alpha-asc"></i> Název</div>
      <div class="btn btn-sm btn-default" data-sort-by="age"><i class="fa fa-history"></i> Stáří</div>
      <div class="btn btn-sm btn-default" data-sort-by="size"><i class="fa fa-sort-amount-desc"></i> Rozsah</div>
    </div>
  </div>
  
  
</div>









<div class="isotope">
  <?php foreach($pl->portfolio_list as $i => $p){ ?>
    <?= $p->htmlPortfolio() ?>
  <?php } ?>
</div>




<div class="modal fade" id="portfolio-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
      </div>
    </div>
  </div>
</div>