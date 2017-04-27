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
  
  public $thumbnail;
  
  public $gallery = [];
  
  
  public function __construct($portfolio_id = false){
    if(!$portfolio_id){
      return false;
    }
    
    $this->portfolio_id = (int) $portfolio_id;
    
    $this->fetchPortfolio();
    
    return true;
  }
  
  
  
  private function fetchPortfolio(){
    global $_DB;
    
    $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.portfolio_id = :portfolio_id
        AND p.visible = 1
      LIMIT 1';
    
    $STH = $_DB->prepare($sql);
    $STH->bindParam(':portfolio_id', $this->portfolio_id);
    $STH->setFetchMode(PDO::FETCH_INTO, $this);
    $STH->execute();
    
    $STH->fetch();
  }
  
  
  
  
  public function htmlPortfolio(){
    ob_start(); ?>

    <div class="<?= $this->css() ?>" onclick="portfolio(<?= $this->portfolio_id ?>)" <?= $this->htmlData() ?>>
      <div class="image">
        <?= is_a($this->thumbnail, 'Gallery') ? $this->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
      </div>
      
      <div class="info">
        <div class="name">
          <?= $this->nameShortest() ?>
          
          <?= $this->interesting ? '<i class="fa fa-star" title="Zajímavá položka"></i>' : '' ?>
          <?= $this->isRunning() ? '<i class="fa fa-cog" title="Položka stále ve vývoji"></i>' : '' ?>
        </div>
        
        <div class="detail">
          <?= $this->detail_short ?>
        </div>
      </div>
    </div>


    <?php return ob_get_clean();
  }
  
  
  
  
  public function htmlPortfolioModal(){
    ob_start(); ?>


    <div class="row portfolio-modal">
      <div class="col-md-4">
        <div class="image">
          <?= is_a($this->thumbnail, 'Gallery') ? $this->thumbnail->htmlThumbnail() : Gallery::htmlPlaceholder() ?>
        </div>
        
        <div class="gallery">
          <?php foreach($this->gallery as $g){ ?>
            <?= $g->htmlFancybox() ?>
          <?php } ?>
        </div>
      </div>


      <div class="col-md-8">
        <div class="detail">
          <div class="label">
            <?= $this->interesting ? '<span class="label label-primary"><i class="fa fa-star"></i> Zajímavá položka</span>' : '' ?>
            <?= $this->isRunning() ? '<span class="label label-success"><i class="fa fa-cog"></i> Ve vývoji</span>' : '' ?>
          </div>

          <div class="text">
            <?= $this->detail ?>
          </div>

          <div class="center">
            <div class="url">
              <?= !empty($this->url) ? '<a href="'.$this->url.'" class="btn btn-sm btn-success"><i class="fa fa-globe"></i> '.$this->nameShortest().'</a>' : '' ?>
            </div>

            <?= !empty($this->github) ? '<a href="'.$this->github.'" class="btn btn-xs btn-default"><i class="fa fa-github"></i> '.$this->nameShortest().' GitHub</a>' : '' ?>
          </div>
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
    
    if($this->interesting){
      $css[] = 'interesting';
    }
    
    if($this->isRunning()){
      $css[] = 'running';
    }
    
    return implode(' ', $css);
  }
  
  
  public function isRunning(){
    if(strtotime($this->date_start) <= strtotime('today')){
      if(empty($this->date_end) OR strtotime($this->date_end) >= strtotime('today')){
        return true;
      }
    }
    
    return false;
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
  
  
}
