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
  
  
}
