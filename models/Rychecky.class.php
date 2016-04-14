<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rychecky
 *
 * @author jaCUBE
 */
class Rychecky {
  
  
  public function databaseConnect(){
    global $_DB;

    try {  // Připojení k databázi pomocí PDO
      $_DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); // Připojení s konstantami z Wordpressu
      $_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_DB->query('SET NAMES utf8'); // Česká diakritika. Husa upálili příliš pozdě... :)
    }catch(PDOException $e) {  
        echo $e->getMessage(); // Něco se nepodařilo? 
    }
  }
  
  
  public function view($name, $data = NULL){
    $path = 'views/';
    $file = $name.'.view.php';
    
    if(preg_match('/^(html|template)_/', $name)){
      $path .= 'template/';
    }
    
    include $path.$file;    
  }
  
  
  /**
   * @brief Odstranění české diakritiky z řetězce v parametru.
   * @param string $string Název s předpokládanou diakritikou
   * @return string Řetězec s odstraněnou diakritikou
   */ 
  
  static function removeCzechChars($string){
    $original = Array('á', 'č', 'ď', 'é', 'ě', 'í', 'ľ', 'ň', 'ó', 'ř', 'š', 'ť', 'ú', 'ů', 'ý', 'ž', 'Á', 'Č', 'Ď', 'É', 'Ě', 'Í', 'Ľ', 'Ň', 'Ó', 'Ř', 'Š', 'Ť', 'Ú', 'Ů', 'Ý', 'Ž', 'ö', 'ü'); // Česká diakritika
    $replace  = Array('a', 'c', 'd', 'e', 'e', 'i', 'l', 'n', 'o', 'r', 's', 't', 'u', 'u', 'y', 'z', 'A', 'C', 'D', 'E', 'E', 'I', 'L', 'N', 'O', 'R', 'S', 'T', 'U', 'U', 'Y', 'Z', 'o', 'u'); // Znaky bez diakritiky
    
    return str_replace($original, $replace, $string); // Vrací řetězec s odstraněnou diakritikou    
  }
  
  
  
  /**
   * Řetězec v parametru připraví do formátu názvu CSS třídy.
   * 
   * @param string $string Vstup k přípravě na CSS třídu.
   * 
   * @return string Formátovaný řetězec na CSS třídu.
   */ 
  
  static function makeCssName($string){
    $string = Rychecky::removeCzechChars($string);
    
    $original = Array(':', '.', '/', ' ', '(', ')', ',', '[', ']', '_');
    $replace  = Array('', '-', '-', '-', '-', '-', '', '-', '', '-');
    
    $string = str_replace($original, $replace, $string);
    
    $string = strtolower($string);
    
    return $string;   
  }  
  
  
  
  
  
}
