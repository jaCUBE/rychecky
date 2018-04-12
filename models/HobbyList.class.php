<?php

/**
 * Stahuje a zpracovává seznam koníčků.
 * @class HobbyList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class HobbyList {
  
  /**
   * Stáhne a zpracuje seznam koníčků.
   * @return Hobby[] // Seznam koníčků
   */

  static function fetchHobbyList(){
		$hobby_list = []; // Seznam koníčků

		$sql = '
    SELECT h.*
    FROM hobby AS h
    WHERE h.locale = :locale
      AND h.visible = 1
    ORDER BY RAND()'; // SQL dotaz pro stažení koníčků

		$STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
		$STH->setFetchMode(PDO::FETCH_CLASS, 'Hobby');
		$STH->execute();

		while ($hobby = $STH->fetch()){ /* @var $hobby Hobby */ // Prochází jednotlivé koníčky...
			$hobby_list[] = $hobby; // Přidá koníček do seznamu
		}

		return $hobby_list;
	}

}