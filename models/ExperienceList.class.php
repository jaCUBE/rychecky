<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Stahuje a zpracovává seznam zkušeností.
 */

class ExperienceList {

  /**
   * @brief Stahuje a zpracovává seznam zkušeností.
   * @return array Seznam zkušeností
   */
  
  static function fetchExperienceList(){
    global $_DB;    

    $experience_list = [];

    $sql = '
      SELECT e.*
      FROM experience AS e
      WHERE e.locale = "'.LOCALE.'"
        AND e.visible = 1
      ORDER BY e.date_start DESC'; // SQL pro stažení seznamu zkušeností
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Experience'); // Do objektů zkušeností
    $STH->execute();
    
    while($e = $STH->fetch()){ /* @var $e Experience */ // Procházení jednotlivých zkušeností...
      $experience_list[] = $e; // Uložení zkušenosti do pole
    }

    return $experience_list;
  }
  
  
}