<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Gallery
 * @brief Objekt obrázku galerie na webu.
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
   * @brief Cesta k souboru
   * @var string $path
   */
  public $path;
  
  /**
   * @brief Název souboru
   * @var string $filename
   */
  public $filename;
   
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
   * @return type
   */
  
  public function url(){
    return URL.'/images'.$this->path.$this->filename;
  }
  
  public function htmlThumbnail(){
    return '<img src="'.$this->url().'" alt="" />';
  }
  
  static function htmlPlaceholder(){
    return '<img src="'.URL.'/images/placeholder.png" alt="" />';
  }
  
  
  public function isThumbnail(){
    if(strpos($this->filename, '_th.')){
      return true;
    }else{
      return false;
    }
  }
  
  
}
