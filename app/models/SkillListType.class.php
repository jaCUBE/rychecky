<?php

/**
 * Stahuje a zpracovává typy dovedností a jejich počty v databázi.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class SkillListType
 */

class SkillListType{

	/**
	 * Zjišťuje, jaký je vybraný typ dovedností.
	 * @return string Vybraný typ dovedností
	 */
	static function selectedSkillType(){
		return $_GET['type'] ?? 'webdev';
	}




	/**
	 * Je kontrolovaný typ dovedností ten vybraný? Zvýrazňuje tlačítko.
	 * @param string $type Kontrolovaný typ
	 * @return boolean Je typ vybraný?
	 */

	static function isSelectedType($type){
		return make_css_name($type) == self::selectedSkillType();
	}





	/**
	 * Poskytuje řazený seznam typů dovedností v poli dle jazyka.
	 * @return string[] Seznam typů dovedností
	 */

	static  function skillList(){
		if(Language::getLocale() == 'cs'){
			$skill_type_list = ['Webdev', 'ICT', 'Jazyky', 'Ostatní']; // Seřazený český seznam
		}else{
			$skill_type_list = ['Webdev', 'ICT', 'Languages', 'Others']; // Anglický
		}

		return array_combine($skill_type_list, $skill_type_list); // Vytváří klíče shodné s hodnotami
	}





	/**
	 * Stahuje počet jednotlivých typů dovedností v databázi.
	 * @return array Počet typů dovedností v databázi (typ => počet)
	 */

	static function fetchSkillTypeStats(){
		$skill_stats = SkillListType::skillList(); // Seznam typů dovedností pro správné řazení

		$sql = '
				SELECT s.type, COUNT(*) as count
				FROM skill AS s
				WHERE s.locale = :locale
				GROUP BY s.type'; // SQL dotaz pro spočítání typů dovedností

		$STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
		$STH->execute();

		while($row = $STH->fetch()){ // Procházení stažených řádků...
			$skill_stats[$row['type']] = $row['count']; // Typ dovednosti => počet
		}

		return $skill_stats;
	}

}