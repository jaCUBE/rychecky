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
class RycheckyController extends Controller  {
  
	public function __construct(){
		parent::__construct();
	}

	public function index(){
    Rychecky::view('index', [
        'hobby' => HobbyList::fetchHobbyList(),
        'social' => SocialList::fetchSocialList()
    ]);
  }





	/**
	 *
	 */
  
  public function skills(){
    Rychecky::view('skill.master', [
        'skill_list' => SkillList::fetchSkillListByType(SkillType::selectedSkillType()),
        'skill_stats' => SkillType::fetchSkillTypeStats()
    ]);
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