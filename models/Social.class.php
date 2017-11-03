<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Social
 *
 * @author jaCUBE
 */

class Social {
  public $row_id;
  public $social_id;
  public $name;
  public $url;
  public $text;
  public $icon;
  public $color;
  public $value;
  public $visible;
  public $added;
  public $timestamp;
  
  
  public function htmlSocialButton(){
    ob_start(); ?>

    <div class="btn-social" style="background: <?= $this->color ?>" title="<?= $this->name ?>" onclick="location.assign('<?= $this->url ?>');">
      <i class="fa <?= $this->icon ?>"></i>
    </div>

    <?php return ob_get_clean();
  }
  
  
}