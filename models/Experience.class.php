<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Experience
 * @brief Zkušenost (zaměstnání/vzdělání) na webu.
 */

class Experience {
  
  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID zkušenosti
   * @var integer $experience_id
   */
  public $experience_id;
  
  /**
   * @brief Typ zkušenosti
   * @var string $type
   */
  public $type;
  
  /**
   * @brief Název zkušenosti.
   * @var string $title
   */
  public $title;
  
  /**
   * @brief Společnost
   * @var string $company
   */
  public $company;
  
  /**
   * @brief Datum začátku zkušenosti
   * @var string $date_start
   */
  public $date_start;
  
  /**
   * @brief Datum konce zkušenosti
   * @var string|boolean $date_end
   */
  public $date_end;
  
  /**
   * @brief Detailní popis zkušenosti
   * @var string $detail
   */
  public $detail;
  
  /**
   * @brief Poznámka
   * @var string $note
   */
  public $note;
  
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
  
  
}