<?php $sl =& $data; /* @var $sl SocialList */ ?>



<div id="contact">
  
  
  
  
  
  <div class="row">   
    <div class="col-md-7">
      <div class="social-bar" style="margin-top: 20px;">
        <?php foreach($sl->social_list as $s){ // Procházení jednotlivých profilů na sociálních sítích... ?>
          <?= $s->htmlSocialButton() // Vykreslení jednoho tlačítka sociálních sítí ?>
        <?php } ?>
      </div>
      
      
      <hr class="clear" />
      
      
      <div class="row" id="contact-table">
        <div class="col-md-6" id="channels">
          <div class="email"><a href="mailto:<?= EMAIL ?>"> <?= EMAIL ?></a></div>
          <div class="tel"><a href="tel:<?= str_replace(' ', '', PHONE) ?>"> <?= PHONE ?></a></div>
          <br />
          <div class="bank"><i class="fa fa-institution"></i> Číslo účtu: <?= BANK ?></a></div>
        </div>
        
        <div class="col-md-6" id="address">
          <div class="name">Jakub Rychecký</div>
          <div class="street"><?= ADDR_STREET.' '.ADDR_STREET_NUMBER ?></div>
          <div class="city"><?= ADDR_ZIP.' '.ADDR_CITY ?></div>
        </div>
      </div>   
    </div>
    
    
    
    
    
    <div class="col-md-5 center">
      <img src="<?= URL ?>/images/qr.png" alt="QR kód" title="QR kód" class="qr" />
    </div>    
  </div>

  
  
  <?php $gmap_address = ADDR_STREET.' '.ADDR_CITY ?>
  <iframe height="450" frameborder="0" id="gmap-iframe" src="https://www.google.com/maps/embed/v1/place?q=<?= $gmap_address ?>&amp;key=AIzaSyDNcVRTFRK2Ljn8n4PQzESMZtkNFDeABNQ&amp;zoom=10">
  </iframe>
</div>