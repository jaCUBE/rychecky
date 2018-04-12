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


  
  
  static function fetchSkillListByType($type){
    $skill_list = [];

    $sql = '
      SELECT s.*
      FROM skill AS s
      WHERE s.type = :type
        AND s.locale = :locale
        AND s.visible = 1
      ORDER BY s.value DESC';
    
    $STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
    $STH->bindParam(':type', $type);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Skill');
    $STH->execute();
    
    while($skill = $STH->fetch()){ /* @var $skill Skill */
      $skill_list[] = $skill;
    }

    return $skill_list;
  }

  
}
