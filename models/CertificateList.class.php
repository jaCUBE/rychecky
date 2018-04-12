<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class CertificateList
 * @brief Stahuje a zpracovává seznam certifikátů.
 */


class CertificateList {
  
  /**
   * @brief Stahuje z databáze seznam certifikátů.
   * @return Certificate[] Seznam certifikátů
   */

  static function fetchCertificateList(){
    $certificate_list = []; // Seznam certifikátů

    $sql = '
      SELECT c.*
      FROM certificate AS c
      WHERE c.locale = :locale
        AND c.visible = 1
      ORDER BY c.issue_date DESC'; // SQL pro stažení certifikátů
    
    $STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Certificate'); // Stažení do objektů certifikátů
    $STH->execute();
    
    while($certificate = $STH->fetch()){ /* @var $certificate Certificate */ // Procházení certifikátů...
      $certificate_list[] = $certificate; // Uložení certifikátů do pole
    }

    return $certificate_list; // Seznam certifikátů
  }

}