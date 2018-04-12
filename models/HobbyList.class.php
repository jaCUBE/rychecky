<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Stahuje a zpracovává seznam koníčků.
 */

class HobbyList {
  
  /**
   * @brief Seznam koníčků
   * @var Hobby $hobby_list
   */
  public $hobby_list = [];
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Konstruktor, stahuje seznam koníčků.
   * @return void
   */
  
  public function __construct(){
    $this->fetchHobbyList(); // Stahuje seznam koníčků
  }
  
  
  
  
  
  /**
   * @brief Stahuje a zpracovává seznam koníčků.
   * @return void
   */
  
  static function fetchHobbyList(){
    global $_DB;

    $hobby_list = [];

    $sql = '
    SELECT h.*
    FROM hobby AS h
    WHERE h.locale = "'.LOCALE.'"
      AND h.visible = 1
    ORDER BY RAND()'; // SQL dotaz pro stažení koníčků
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Hobby'); // Stahování do objektů koníčků
    $STH->execute();
    
    while($hobby = $STH->fetch()){ /* @var $hobby Hobby */ // Procházení jednotlivých koníčků...
      $hobby_list[] = $hobby; // Přidání koníčku do seznamu
    }

    return $hobby_list;
  }
  
  
}