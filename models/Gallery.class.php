<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Gallery
 * @brief Obrázek galerie na webu.
 */

class Gallery {
 
  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID zkušenosti k této galerii
   * @var integer $portfolio_id
   */
  public $portfolio_id;
  
  /**
   * @brief Název souboru
   * @var string $filename
   */
  public $filename;
  
  /**
   * @brief Popis obrázku
   * @var string $title
   */
  public $title;
  
  /**
   * @brief Jedná se o thumbnail?
   * @var boolean $thumbnail
   */
  public $thumbnail;
   
  /**
   * @brief Hodnota pořadí
   * @var integer $order
   */
  public $order;
  
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
   * @brief Generuje URL samotného obrázku.
   * @return string URL obrázku
   */
  
  public function url(){
    return URL.'/images/portfolio/'.$this->portfolio_id.'/'.$this->filename; // URL obrázku
  }
  
  
  
  
  
  /**
   * @briefj Generuje HTML s obrázkem.
   * @return string HTML s obrázkem
   */
  
  public function htmlThumbnail(){
    return '<img src="'.$this->url().'" alt="" />'; // HTML s obrázkem
  }

  
  
  
  
  /**
   * @brief Generuje HTML s náhledem obrázku pro Fancybox.
   * @return string HTML náhledu obrázku
   */
  
  public function htmlFancyBox(){
    return '<a href="'.$this->url().'" data-fancybox="portfolio-'.$this->portfolio_id.'" data-caption="'.htmlspecialchars($this->title).'" class="fancybox">'.$this->htmlThumbnail().'</a>'; // HTML náhledu obrázku
  }
  
  
  
  
  
  /**
   * @brief Jedná se o náhled obrázku?
   * @return boolean Náhled?
   */
  
  public function isThumbnail(){
    return (boolean) $this->thumbnail; // Náhled?
  }
  
  
  
  
  
  /**
   * @brief Generuje HTML kód placeholderu obrázku.
   * @return string HTML placeholderu
   */
  
  static function htmlPlaceholder(){
    return '<img src="'.URL.'/images/placeholder.png" alt="" />'; // HTML placeholderu
  }
  
  
}