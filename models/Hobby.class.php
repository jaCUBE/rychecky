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
  
  
  
  public function htmlHobby(){
    ob_start(); ?>

<div class="hobby" style="<?= $this->css() ?>">
  <?= $this->name ?>
</div>

    <?php return ob_get_clean();
  }
  
  
  private function css(){
    $css = [];
    
    $css['font-size'] = $this->size * 1.8.'em';
    $css['margin-left'] = rand(0, 10).'px';
    $css['margin-right'] = rand(0, 10).'px';
    $css['margin-top'] = rand(0, 5).'px';
    
    if(rand(0, 1) == 0){
      $css['float'] = 'left';
    }else{
      $css['float'] = 'right';
    }
    
    
    $output = '';
    
    foreach($css as $property => $value){
      $output .= $property.': '.$value.'; ';
    }
    
    return $output;
  }
  
  
}
