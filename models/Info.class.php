<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Hobby
 * @brief Stahuje a zpracovává základní informace (telefonní číslo, e-mail, atd.)
 */

class Info {
  
  /**
   * @brief Konstruktor, stahuje základní informace.
   * @return void
   */
  
  public function __construct(){
    $this->fetchInfo(); // Stahuje základní informace
  }
  
  
  
  
  
  /**
   * @brief Stahuje základní informace a definuje je konstantu.
   * @return void
   */
  
  private function fetchInfo(){
    global $_DB;
    
    $sql = '
      SELECT i.*
      FROM info AS i
      WHERE i.visible = 1'; // SQL dotaz pro stažení základních informací
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $STH->execute();
    
    while($obj = $STH->fetch()){ // Procházení jednotlivých základních informací...
      $name = mb_strtoupper($obj->name); // Převod jména na uppercase
      
      define($name, $obj->value); // Definování jedné konstanty
    }
  }
  
  
}