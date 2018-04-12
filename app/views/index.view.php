<?php $hobby_list =& $data['hobby']; /* @var $hobby_list Hobby */  ?>
<?php $social_list =& $data['social']; /* @var $social_list Social */  ?>


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
    
    <hr class="clear" />

      <?php Rychecky::view('socialbar.master', $social_list) ?>
  </div>
  
  
  
  
  
  <div class="col-md-4">
    <h2>
      <i class="fa fa-cloud"></i> <?= e('Zájmy', 'Hobbies') ?>
    </h2>

    <div class="hobby-list">
      <?php foreach($hobby_list as $hobby){ ?>
        <div class="hobby" style="<?= array_to_css($hobby->randomHobbyCss()) // Náhodná pozice ve wordcloudu ?>">
          <?= $hobby->name // Název koníčku ?>
        </div>
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
