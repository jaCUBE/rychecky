<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Hobby
 * @brief Objekt koníčku na webu.
 */

class Hobby {
 
  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID koníčku
   * @var integer $hobby_id
   */
  public $hobby_id;
  
  /**
   * @brief Název koníčku
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Velikost textu tohoto koníčku
   * @var float $size
   */
  public $size;
  
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
   * @brief Generuje HTML kód koníčku.
   * @return string HTML koníčku
   */
  
  public function htmlHobby(){
    ob_start(); // Začátek bufferu ?>

    <div class="hobby" style="<?= $this->css() // CSS ?>">
      <?= $this->name // Název koníčku ?>
    </div>

    <?php return ob_get_clean(); // Vrací obsah bufferu
  }
  
  
  
  
  
  /**
   * @brief Generuje náhodný CSS tohoto koníčku.
   * @return string Náhodný CSS
   */
  
  private function css(){
    $css = []; // Iniciace CSS
    
    $css['font-size'] = $this->size * 0.02.'em'; // Velikost
    $css['margin-left'] = rand(0, 10).'px'; // Odsazení zleva
    $css['margin-right'] = rand(0, 10).'px'; // Odsazení zprava
    $css['margin-top'] = rand(0, 5).'px'; // Odsazení zeshora
    
    if(rand(0, 1) == 0){ // 1:1 zarovnání doleva/doprava...
      $css['float'] = 'left';
    }else{
      $css['float'] = 'right';
    }
    
    
    $output = ''; // Iniciace výstupu
    
    foreach($css as $property => $value){ // Procházení pole CSS hodnot...
      $output .= $property.': '.$value.'; '; // Generování výstupu
    }
    
    return trim($output); // Vrací vygenerovaný CSS
  }
  
  
}