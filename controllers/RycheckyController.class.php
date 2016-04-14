<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RycheckyController
 *
 * @author jaCUBE
 */
class RycheckyController {
  
  public function __construct() {
    $action = ACTION;
    
    if(empty($action)){
      $action = 'index';
    }
    
    $this->$action();
  }
  
  
  public function index(){
    global $_RYC;
    
    $hobby_list = new HobbyList();
    
    $_RYC->view('index', $hobby_list);
  }
  
  
  
  
  
  public function skills(){
    global $_RYC;
    
    $skill_list = new SkillList();
    
    $_RYC->view('skills', $skill_list);
  }
  
}
