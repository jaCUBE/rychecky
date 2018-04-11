<?php $hl =& $data['hobby']; /* @var $hl HobbyList */  ?>
<?php $sl =& $data['social']; /* @var $sl SocialList */  ?>


<div class="row">
  <div class="col-md-5">
    <h2>
      <i class="fa fa-user"></i> <?= e('O mně', 'About Me') ?>
    </h2>


    <div class="index-text">
      <p>
        Momentálně se živím jako vývojář webového software ve vědecké organizaci, která se věnuje jadernému výzkumu.
        Mám na starosti celý cyklus – od počátečního modelování dat a návrhu architektury relační databáze, přes kód samotný až po front end a UX našich zaměstnanců.
      </p>
      <p>
        <a href="javascript:void(0)" onclick="portfolio(7);">Systém zajišťuje personální i projektové řízení pro společnost o ~350 zaměstnancích.</a> Jedná se určitě o můj největší projekt,
        ale najde se i spousta menších věcí a fanouškovských záležitostí, <a href="<?= URL ?>/portfolio">o kterých se můžete dočíst v portfoliu</a>.
      </p>
      <p>
        Vše okolo počítačů je mým koníčkem už od dětství, ale čas trávím i četbou, sledováním filmů nebo fotografováním.
        Určitě mi neváhejte napsat s čímkoliv.
      </p>
    </div>
    
    
    <div class="social-bar">
      <?php foreach($sl->social_list as $s){ // Procházení jednotlivých profilů na sociálních sítích... ?>
        <?= $s->htmlSocialButton() // Vykreslení jednoho tlačítka sociálních sítí ?>
      <?php } ?>
    </div>
    
    <hr class="clear" />
  </div>
  
  
  
  
  
  <div class="col-md-4">
    <h2>
      <i class="fa fa-cloud"></i> <?= e('Zájmy', 'Hobbies') ?>
    </h2>

    <div class="hobby-list">
      <?php foreach($hl->hobby_list as $h){ ?>
        <?= $h->htmlHobby() ?>
      <?php } ?>
    </div>
    
    <hr style="visibility: hidden; clear: both" />
  </div>
  
  
  
  
  
  <div class="col-md-3">
    <div class="center" style="margin-top: 80px">
      <a href="http://cv.rychecky.cz/" class="btn btn-lg btn-info">
        <i class="fa fa-download"></i> <?= e('Stáhnout resumé', 'Download Resumé') ?>
      </a>
    </div>
      
    <div class="center" style="margin-top: 40px;">
      <a href="mailto:jakub@rychecky.cz" class="btn btn-dark">
        <i class="fa fa-envelope-o"></i> jakub@rychecky.cz
      </a>
    </div>
  </div>
</div>
