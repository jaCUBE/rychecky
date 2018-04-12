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
    $data = [];
    
    $data['hobby'] = HobbyList::fetchHobbyList();
    $data['social'] = SocialList::fetchSocialList();
    
    Rychecky::view('index', $data);
  }
  
  
  
  
  
  public function skills(){
    $skill_list = new SkillList();

      Rychecky::view('skills', $skill_list);
  }
  
  
  public function portfolio(){
    Rychecky::view('portfolio.master', PortfolioList::fetchPortfolioList());
  }
  
  
  public function experiences(){
    Rychecky::view('experience.master', ExperienceList::fetchExperienceList());
  }
  
  
  public function certificate(){
    Rychecky::view('certificate.master', CertificateList::fetchCertificateList());
  }
  
  
  public function contact(){
    Rychecky::view('contact', SocialList::fetchSocialList());
  }


}
