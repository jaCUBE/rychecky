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
  /**
   * 
   * @type Portfolio $portfolio_list
   */
  public $portfolio_list = [];
  
  
  
  public function __construct(){
    $this->fetchPortfolioList();
  }
  
  
  
  private function fetchPortfolioList(){
    global $_DB;
    
    $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.visible = 1
      ORDER BY p.name_short ASC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Portfolio');
    $STH->execute();
    
    while($portfolio = $STH->fetch()){ /* @var $portfolio Portfolio */
      $portfolio->fetchPortfolioGallery();
      
      $this->portfolio_list[$portfolio->portfolio_id] = $portfolio;
    }
  } 
  

}
