<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HobbyList
 *
 * @author jaCUBE
 */
class HobbyList {
  
  /**
   *
   * @var Hobby $hobby_list
   */
  public $hobby_list = [];
  
  
  public function __construct(){
    $this->fetchHobbyList();
  }
  
  
  private function fetchHobbyList(){
    global $_DB;
    
    $sql = '
    SELECT h.*
    FROM hobby AS h
    WHERE h.visible = 1
    ORDER BY RAND()';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Hobby');
    $STH->execute();
    
    while($hobby = $STH->fetch()){ /* @var $hobby Hobby */
      $this->hobby_list[] = $hobby;
    }
  }
}
