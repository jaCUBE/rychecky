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
    
    $data = [];
    
    $data['hobby'] = new HobbyList();
    $data['social'] = new SocialList();
    
    $_RYC->view('index', $data);
  }
  
  
  
  
  
  public function skills(){
    global $_RYC;
    
    $skill_list = new SkillList();
    
    $_RYC->view('skills', $skill_list);
  }
  
  
  public function portfolio(){
    global $_RYC;
    
    $portfolio_list = new PortfolioList();
    
    $_RYC->view('portfolio', $portfolio_list);
  }
  
  
  public function experiences(){
    global $_RYC;
    
    $experience_list = new ExperienceList();
    
    $_RYC->view('experiences', $experience_list);
  }
  
  
  public function certificate(){
    global $_RYC;
    
    $certificate_list = new CertificateList();
    
    $_RYC->view('certificate', $certificate_list);
  }
  
  
  public function contact(){
    
  }
  

  
  
}
