<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SkillList
 *
 * @author jaCUBE
 */
class SkillList {
  
  /**
   * @brief
   * @var Skill $skill_list
   */
  public $skill_list = ['Webdev' => [], 'ICT' => [], 'Jazyky' => [], 'Ostatní' => []];
  
  public $type = 'webdev';
  
  public function __construct(){
    $this->fetchSkillList();
    $this->prepareSkillType();
  }
  
  private function prepareSkillType(){
    if(!empty($_GET['type'])){
      $this->type = $_GET['type'];
    }
  }
  
  
  private function fetchSkillList(){
    global $_DB;
    
    
    $sql = '
      SELECT s.*
      FROM skill AS s
      WHERE s.visible = 1
      ORDER BY s.value DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Skill');
    $STH->execute();
    
    while($skill = $STH->fetch()){ /* @var $skill Skill */
      $this->skill_list[$skill->type][] = $skill;
    }
  }
  
  
  public function countSkill($type){
    return (int) count($this->skill_list[$type]);
  }
  
  
  public function skillTypeUrl($type){
    return URL.'/skills/'.$this->skillTypePlainName($type);
  }
  
  
  public function skillTypePlainName($type){
    return Rychecky::makeCssName($type);
  }
  
  
  public function isSkillTypeSelected($type){
    return $this->type == $this->skillTypePlainName($type);
  }
  
}
