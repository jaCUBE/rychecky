<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocialList
 *
 * @author jaCUBE
 */
class SocialList {
  
  /**
   * @brief
   * @var Social $social_list
   */
  public $social_list = [];
  
  
  
  
  public function __construct(){
    $this->fetchSocialList();
  }
    
  
  private function fetchSocialList(){
    global $_DB;
    
    
    $sql = '
      SELECT s.*
      FROM social AS s
      WHERE s.visible = 1
      ORDER BY s.order DESC, s.name ASC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Social');
    $STH->execute();
    
    while($social = $STH->fetch()){ /* @var $social Social */
      $this->social_list[] = $social;
    }
  }
  
  
}