<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Skill
 * @brief Objekt jedné dovednosti na webu.
 */

class Skill {

  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID dovednosti
   * @var integer $skill_id
   */
  public $skill_id;
  
  /**
   * @brief Typ dovednosti
   * @var string $type
   */
  public $type;
  
  /**
   * @brief Název dovednosti
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Hodnota dovednosti (0–100)
   * @var integer $value
   */
  public $value;
  
  /**
   * @brief Detailní popis dovednosti
   * @var string $detail
   */
  public $detail;
  
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
  
  
  
  
  public function htmlSkill(){
    ob_start(); ?>


    <div class="skill">
      <div class="name">
        <?= $this->name ?>
      </div>

      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?= $this->value ?>%;">
        </div>
      </div>
      
      <div class="detail">
        <?= $this->detail ?>
      </div>
    </div>


    <?php return ob_get_clean();
  }
  
  
}