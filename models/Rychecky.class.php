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
  
  
  static function databaseConnect(){
    global $_DB;

    try {  // Připojení k databázi pomocí PDO
      $_DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); // Připojení s konstantami z Wordpressu
      $_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_DB->query('SET NAMES utf8'); // Česká diakritika. Husa upálili příliš pozdě... :)
    }catch(PDOException $e) {  
        echo $e->getMessage(); // Něco se nepodařilo? 
    }
  }
  
  
  static function view($name, $data = NULL){
    $path = 'views/';
    $filename = str_replace('.', '/', $name).'.view.php';

    include $path.$filename;    
  }
  

  

  
  
  
  static function title(){
    $rnd = rand(1, 100);
    
    if($rnd >= 95){
      $adj = 'Code Monkey';
    }elseif($rnd >= 90){
      $adj = 'Cowboy';
    }else{
    $adj = '';
    }
    
    return 'Full Stack '.$adj.' Developer';
  }
  
}
