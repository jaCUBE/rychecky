<?php

/**
 * Záznam jednoho odkazu na sociální sítě.
 * @class Social
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Social
{

  /**
   * @var integer $row_id ID záznamu
   */
  public $row_id;

  /**
   * @var integer $social_id
   */
  public $social_id;

  /**
   * @var string $name Název sociální sítě
   */
  public $name;

  /**
   * @var string $url URL profilu na síti
   */
  public $url;

  /**
   * @var string $icon Ikona z Font Awesome
   */
  public $icon;

  /**
   * @var string $color HEX kód barvy
   */
  public $color;

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
