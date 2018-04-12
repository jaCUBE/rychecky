<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Stahuje a zpracovává seznam certifikátů.
 */

class CertificateList {
  
  /**
   * @brief Stahuje z databáze seznam certifikátů.
   * @return array Seznam certifikátů
   */

  static function fetchCertificateList(){
    global $_DB;

    $certificate_list = [];

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
      $certificate_list[] = $c; // Uložení certifikátů do pole
    }

    return $certificate_list; // Vrací seznam certifikátů
  }


}