<?php

/**
 * Koníček (zájem) na webu.
 * @class Hobby
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Hobby {
 
  /**
   * @var integer $row_id ID záznamu
   */
  public $row_id;
  
  /**
   * @var integer $hobby_id ID koníčku
   */
  public $hobby_id;
  
  /**
   * @var string $name Název koníčku
   */
  public $name;
  
  /**
   * @var float $size Velikost textu tohoto koníčku
   */
  public $size;
  
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

  
  
  
  
  
  /**
   * Generuje náhodný CSS tohoto koníčku dle jeho velikosti.
   * @return array Náhodné CSS v poli
   */
  
  public function randomHobbyCss(){
    $css = []; // Iniciace CSS
    
    $css['font-size'] = $this->size * 0.02.'em'; // Velikost
    $css['margin-left'] = rand(0, 10).'px'; // Odsazení zleva
    $css['margin-right'] = rand(0, 10).'px'; // Odsazení zprava
    $css['margin-top'] = rand(0, 5).'px'; // Odsazení zeshora
    $css['float'] = rand(0, 1) ? 'left' : 'right'; // 1:1 zarovnání doleva/doprava...

    return $css;
  }
  
}