<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PortfolioList
 *
 * @author jaCUBE
 */
class PortfolioList {
  
  static function fetchPortfolioList(){
    global $_DB;

    $portfolio_list = [];

    $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.locale = "'.LOCALE.'"
        AND p.visible = 1
      ORDER BY p.size DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Portfolio');
    $STH->execute();
    
    while($portfolio = $STH->fetch()){ /* @var $portfolio Portfolio */
      $portfolio->fetchPortfolioGallery();
      
      $portfolio_list[$portfolio->portfolio_id] = $portfolio;
    }

    return $portfolio_list;
  } 
  

}
