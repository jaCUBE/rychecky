<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Objekt certifikátu na webu.
 */

class Certificate {
  
  /**
   * @brief ID záznamu
   * @var integer $row_id
   */
  public $row_id;
  
  /**
   * @brief ID certifikátu
   * @var integer $certificate_id
   */
  public $certificate_id;
  
  /**
   * @brief Typ certifikátu
   * @var string $type
   */
  public $type;
  
  /**
   * @brief Název certifikátu
   * @var string $name
   */
  public $name;
  
  /**
   * @brief Detailní popis certifikátu
   * @var string $detail
   */
  public $detail;
  
  /**
   * @brief Datum vydání certifikátu
   * @var string $issue_date
   */
  public $issue_date;

  /**
   * @brief Vydavatel certifikátu
   * @var string $issue_by
   */
  public $issue_by;
  
  /**
   * @brief URL certifikátu
   * @var string $url
   */
  public $url;
  
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
