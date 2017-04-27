<?php

$sl =& $data; /* @var $sl SocialList */

?>


<div id="contact">
  <div class="row">   
    <div class="col-md-4">
      <table id="contact-table">
        <tr class="email">
          <td class="icon"><i class="fa fa-envelope-o"></i></td>
          <td class="value"><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a></td>
        </tr>
        <tr class="phone">
          <td class="icon"><i class="fa fa-mobile"></i></td>
          <td class="value"><a href="tel:<?= str_replace(' ', '', PHONE) ?>"><?= PHONE ?></a></td>
        </tr>
        <tr class="skype">
          <td class="icon"><i class="fa fa-skype"></i></td>
          <td class="value"><?= SKYPE ?></td>
        </tr>        
      </table>       
      
      <div class="social-bar" style="margin-top: 20px;">
        <?php foreach($sl->social_list as $s){ // Procházení jednotlivých profilů na sociálních sítích... ?>
          <?= $s->htmlSocialButton() // Vykreslení jednoho tlačítka sociálních sítí ?>
        <?php } ?>
      </div>
      
      <hr class="clear" />
    </div>
    
    
    
    
    
    <div class="col-md-4">
      <div id="address">
        <div class="name">Jakub Rychecký</div>
        <div class="street"><?= ADDR_STREET ?></div>
        <div class="city"><?= ADDR_ZIP.' '.ADDR_CITY ?></div>
      </div>    
    </div>
    
    
    
    
    
    <div class="col-md-4 center">
      <img src="<?= URL ?>/images/qr.png" alt="QR kód" title="QR kód" class="qr" />
    </div>    
  </div>

  
  
  <?php $gmap_address = ADDR_STREET.' '.ADDR_CITY ?>

  

  <iframe height="450" frameborder="0" id="gmap-iframe" src="https://www.google.com/maps/embed/v1/place?q=<?= $gmap_address ?>&amp;key=AIzaSyDNcVRTFRK2Ljn8n4PQzESMZtkNFDeABNQ&amp;zoom=10">
  </iframe>
</div>