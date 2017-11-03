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
   * @brief Zkrácený textový popis
   * @var string $detail_short
   */
  public $detail_short;
  
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
   * @brief Datum začátku vývoje položky
   * @var string $date_start
   */
  public $date_start;
  
  /**
   * @brief Datum konce vývoje položky
   * @var string $date_end
   */
  public $date_end;
  
  
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
   * @brief Je tato položka portfolia zajímavá?
   * @var boolean $interesting
   */
  public $interesting;
  
  /**
   * @brief Lokalizace (cs/en)
   * @return string $locale
   */
  public $locale;
  
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
  
  /**
   *
   * @var type 
   */
  public $thumbnail;
  
  public $gallery = [];
  
  
  public function __construct($portfolio_id = false){
    if($portfolio_id){
      $this->portfolio_id = (int) $portfolio_id;
      $this->fetchPortfolio();
    }
  }
  
  
  
  private function fetchPortfolio(){
    global $_DB;
    
    $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.portfolio_id = :portfolio_id
        AND p.locale = "'.LOCALE.'"
        AND p.visible = 1
      LIMIT 1';
    
    $STH = $_DB->prepare($sql);
    $STH->bindParam(':portfolio_id', $this->portfolio_id);
    $STH->setFetchMode(PDO::FETCH_INTO, $this);
    $STH->execute();
    
    $STH->fetch();
  }
  

  
  
  public function fetchPortfolioGallery(){
    global $_DB;
    
    $sql = '
      SELECT g.*
      FROM gallery AS g
      WHERE g.portfolio_id = :portfolio_id
        AND g.visible = 1
      ORDER BY g.order DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->bindParam(':portfolio_id', $this->portfolio_id);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Gallery');
    $STH->execute();
    
    while($gallery = $STH->fetch()){
      if($gallery->isThumbnail()){
        $this->thumbnail = $gallery;
      }else{
        $this->gallery[] = $gallery;
      }
    }
  }
  
  
  
  
  
  /**
   * 
   * @return type
   */
  
  public function htmlPortfolio(){
    ob_start(); ?>

    <div class="<?= $this->css() ?>" onclick="portfolio(<?= $this->portfolio_id ?>)" <?= $this->htmlData() ?>>
      <div class="image">
        <?= is_a($this->thumbnail, 'Gallery') ? $this->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
      </div>
      
      <div class="info">
        <div class="name">
          <?= $this->nameShortest() ?>
          
          <?= $this->isInteresting() ? '<i class="fa fa-star" title="Zajímavá položka"></i>' : '' ?>
          <?= $this->isRunning() ? '<i class="fa fa-cog" title="Položka stále ve vývoji"></i>' : '' ?>
        </div>
        
        <div class="detail">
          <?= $this->detail_short ?>
        </div>
      </div>
    </div>


    <?php return ob_get_clean();
  }
  
  
  public function nameShortest(){
    if(!empty($this->name_short)){
      return $this->name_short;
    }else{
      return $this->name;
    }
  }
  
  
  private function age(){
    $difference = time() - strtotime($this->date_start);
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
  
  
  
  private function css(){
    $css = [];
    
    $css[] = 'portfolio';
    $css[] = Rychecky::makeCssName($this->type);
    
    if($this->isInteresting()){
      $css[] = 'interesting';
    }
    
    if($this->isRunning()){
      $css[] = 'running';
    }
    
    return implode(' ', $css);
  }
  
  
  public function isRunning(){
    $started = !empty($this->date_start) AND  strtotime($this->date_start) <= strtotime('today'); // Začato: datum začátku existuje a proběhlo
    $ended = !empty($this->date_end) AND strtotime($this->date_end) <= strtotime('today'); // Ukončeno: datum konce existuje a proběhlo
    
    return $started AND !$ended; // Začalo a neskončilo
  }
  
  
  public function isInteresting(){
    return !empty($this->interesting);
  }
  
}
