<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExperiencesList
 *
 * @author jaCUBE
 */
class ExperienceList {
  
  /**
   * @brief
   * @var Experience $experience_list
   */
  public $experience_list = [];
  
  
  
  
  public function __construct(){
    $this->fetchExperienceList();
  }
    
  
  private function fetchExperienceList(){
    global $_DB;
    
    
    $sql = '
      SELECT e.*
      FROM experience AS e
      WHERE e.visible = 1
      ORDER BY e.date_start DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Experience');
    $STH->execute();
    
    while($e = $STH->fetch()){ /* @var $e Experience */
      $this->experience_list[] = $e;
    }
  }
}
