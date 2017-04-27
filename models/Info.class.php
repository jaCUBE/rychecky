<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Info
 *
 * @author jaCUBE
 */
class Info {
  
  
  public function __construct(){
    $this->fetchInfo();
  }
  
  private function fetchInfo(){
    global $_DB;
    
    $sql = '
      SELECT i.*
      FROM info AS i
      WHERE i.visible = 1';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $STH->execute();
    
    while($obj = $STH->fetch()){
      $name = mb_strtoupper($obj->name);
      
      define($name, $obj->value);
    }
  }
}
