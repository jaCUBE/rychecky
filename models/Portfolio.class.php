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
  
  
}
