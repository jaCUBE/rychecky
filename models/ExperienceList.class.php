<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class ExperienceList
 * @brief Stahuje a zpracovává seznam zkušeností (práce/vzdělání).
 */

class ExperienceList {

  /**
   * @brief Stahuje a zpracovává seznam zkušeností (práce/vzdělání).
   * @return Experience[] Seznam zkušeností
   */
  
  static function fetchExperienceList(){
    $experience_list = []; // Seznam zkušeností

    $sql = '
      SELECT e.*
      FROM experience AS e
      WHERE e.locale = :locale
        AND e.visible = 1
      ORDER BY e.date_start DESC'; // SQL pro stažení seznamu zkušeností
    
    $STH = db()->prepare($sql);
    $STH->bindParam(':locale', Language::getLocale());
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Experience');
    $STH->execute();

    while($e = $STH->fetch()){ /* @var $e Experience */ // Procházení jednotlivých zkušeností...
      $experience_list[] = $e; // Uložení zkušenosti do pole
    }

    return $experience_list;
  }
  
  
}