<?php /* @var $data CertificateList */ ?>



<?php $cl =& $data ?>





<h2>
  <i class="fa fa-certificate"></i> Certifikace
</h2>



<div id="certificate-list">
  <div class="row">    
    <div class="col-md-8">
      <?php foreach($cl->certificate_list as $c){ ?>
        <div class="certificate">
          <div class="name">
            <?= $c->name ?>
          </div>

          <div class="meta">
            <span class="label type">
              <?= $c->type ?>
            </span>
            <span class="label time">
              <i class="fa fa-calendar"></i> <?= date('n/Y', strtotime($c->issue_date)) ?>
            </span>
            <span class="issue-by">
              <?= $c->issue_by ?>
            </span>
          </div>        

          <div class="detail">
            <?= $c->detail ?>
          </div>
        </div>
      <?php } ?>
    </div>
    
    
    
    <div class="col-md-4">
      <div id="certificate-timeline"></div>
    </div>
  </div>
</div>