<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class HobbyList
 * @brief Stahuje a zpracovává seznam koníčků.
 */

class HobbyList {
  
  /**
   * @brief Stahuje a zpracovává seznam koníčků.
   * @return Hobby[] // Seznam koníčků
   */

  static function fetchHobbyList(){
    $hobby_list = [];

    $sql = '
    SELECT h.*
    FROM hobby AS h
    WHERE h.locale = :locale
      AND h.visible = 1
    ORDER BY RAND()'; // SQL dotaz pro stažení koníčků
    
    $STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Hobby'); // Stahování do objektů koníčků
    $STH->execute();
    
    while($hobby = $STH->fetch()){ /* @var $hobby Hobby */ // Procházení jednotlivých koníčků...
      $hobby_list[] = $hobby; // Přidání koníčku do seznamu
    }

    return $hobby_list;
  }

}