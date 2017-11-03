<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Stahuje a zpracovává seznam certifikátů.
 */

class CertificateList {
  
  /**
   * @brief Seznam certifikátů.
   * @var Certificate $certificate_list
   */
  public $certificate_list = [];
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Konstruktor, stahuje seznam certifikátů.
   * @return void
   */
  
  public function __construct(){
    $this->fetchCertificateList(); // Stahuje seznam certifikátů
  }
  
  
  
  
  
  /**
   * @brief Stahuje z databáze seznam certifikátů.
   * @return void
   */
  
  private function fetchCertificateList(){
    global $_DB;
        
    $sql = '
      SELECT c.*
      FROM certificate AS c
      WHERE c.locale = "'.LOCALE.'"
        AND c.visible = 1
      ORDER BY c.issue_date DESC'; // SQL pro stažení certifikátů
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Certificate'); // Stažení do objektů certifikátů
    $STH->execute();
    
    while($c = $STH->fetch()){ /* @var $certificate Certificate */ // Procházení certifikátů...
      $this->certificate_list[] = $c; // Uložení certifikátů do pole
    }
  }
  
  
}