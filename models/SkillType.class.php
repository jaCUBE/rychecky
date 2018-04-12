<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 12.04.2018
 * Time: 17:41
 */

class SkillType
{

	static function selectedSkillType(){
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}else{
			$type = 'Webdev';
		}

		return $type;
	}

	static function isSelectedType($type){
		return Rychecky::makeCssName($type) == self::selectedSkillType();
	}


	static  function skillList(){
		if(LOCALE == 'cs'){
			$skill_type_list = ['Webdev', 'ICT', 'Jazyky', 'Ostatní'];
		}else{
			$skill_type_list = ['Webdev', 'ICT', 'Languages', 'Others'];
		}

		return array_combine($skill_type_list, $skill_type_list);
	}


	static function fetchSkillTypeStats(){
		global $_DB;

		$skill_stats = SkillType::skillList();

		$sql = '
				SELECT s.type, COUNT(*) as count
				FROM skill AS s
				WHERE s.locale = "'.LOCALE.'"
				GROUP BY s.type';

		$STH = $_DB->prepare($sql);
		$STH->execute();

		while($row = $STH->fetch()){
			$skill_stats[$row['type']] = $row['count'];
		}

		return $skill_stats;
	}


}