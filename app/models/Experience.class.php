<?php

/**
 * Zkušenost (zaměstnání/vzdělání) na webu.
 * @class Experience
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */



class Experience {
  
  /**
   * @var integer $row_id ID záznamu
   */
  public $row_id;
  
  /**
   * @var integer $experience_id ID zkušenosti
   */
  public $experience_id;
  
  /**
   * @var string $type Typ zkušenosti
   */
  public $type;
  
  /**
   * @var string $title Název zkušenosti.
   */
  public $title;
  
  /**
   * @var string $company Společnost
   */
  public $company;
  
  /**
   * @var string $date_start Datum začátku zkušenosti
   */
  public $date_start;
  
  /**
   * @var string|boolean $date_end Datum konce zkušenosti
   */
  public $date_end;
  
  /**
   * @var string $detail Detailní popis zkušenosti
   */
  public $detail;
  
  /**
   * @var string $note Poznámka
   */
  public $note;
  
  /**
   * @return string $locale Lokalizace (cs/en)
   */
  public $locale;
  
  /**
   * @var boolean $visible Viditelný?
   */
  public $visible;
  
  /**
   * @var string $added Datum a čas přidání záznamu
   */
  public $added;
  
  /**
   * @var string $timestamp Datum a čas změny záznamu
   */
  public $timestamp;

}