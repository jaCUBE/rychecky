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
  
  static function fetchSocialList(){
    $social_list = [];

    $sql = '
      SELECT s.*
      FROM social AS s
      WHERE s.visible = 1
      ORDER BY s.order DESC, s.name ASC';
    
    $STH = db()->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Social');
    $STH->execute();
    
    while($social = $STH->fetch()){ /* @var $social Social */
      $social_list[] = $social;
    }

    return $social_list;
  }
  
  
}