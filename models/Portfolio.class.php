<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Portfolio
 * @brief Objekt portfolia na webu.
 */

class Portfolio {

  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID portfolia
   * @var integer $portfolio_id
   */
  public $portfolio_id;
  
  /**
   * @brief Typ portfolia
   * @var string $type
   */
  public $type;
  
  /**
   * @brief Název portfolia
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Název portfolia (zkrácený)
   * @var string $name_short
   */
  public $name_short;
  
  /**
   * @brief Detailní popis portfolia
   * @var string $detail
   */
  public $detail;
  
  /**
   * @brief Název společnosti
   * @var string $company
   */
  public $company;

  /**
   * @brief URL portfolia
   * @var string $url
   */
  public $url;
  
  /**
   * @brief Datum vytvoření portfolia
   * @var string $date_create
   */
  public $date_create;
  
  /**
   * @brief Velikost projektu portfolia
   * @var integer $size
   */
  public $size;
  
  /**
   * @brief URL repozitáře GitHub
   * @var string $github
   */
  public $github;
  
  /**
   * @brief Funguje tato položka portfolia?
   * @var string $working
   */
  public $working;
  
  /**
   * @brief Viditelný?
   * @var boolean $visible
   */
  public $visible;
  
  /**
   * @brief Datum a čas přidání záznamu
   * @var string $added
   */
  public $added;
  
  /**
   * @brief Datum a čas změny záznamu
   * @var string $timestamp 
   */
  public $timestamp;
  
  
  
  
  
  public function htmlPortfolio(){
    ob_start(); ?>

<div class="portfolio <?= Rychecky::makeCssName($this->type) ?>" onclick="portfolio(<?= $this->portfolio_id ?>)" <?= $this->htmlData() ?>>
      <div class="image">
        
      </div>
      
      <div class="info">
        <div class="name">
          <?= $this->nameShortest() ?>
        </div>

        <div class="company">
          <?= $this->company ?>
        </div>
      </div>
    </div>


    <?php return ob_get_clean();
  }
  
  
  private function nameShortest(){
    if(!empty($this->name_short)){
      return $this->name_short;
    }else{
      return $this->name;
    }
  }
  
  
  private function age(){
    $difference = time() - strtotime($this->date_create);
    return round($difference / (24 * 60 * 60));
  }
  
  
  private function htmlData(){
    $data = [];
    
    $data['age'] = $this->age();
    $data['name'] = Rychecky::removeCzechChars($this->nameShortest());
    $data['size'] = $this->size * -1;
    
    $output = '';
    
    foreach($data as $a => $v){
      $output .= ' data-'.$a.'="'.$v.'" ';
    }
    
    return $output;
  }
  
  
}
