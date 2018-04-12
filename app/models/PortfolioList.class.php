<?php

/**
 * Stahuje a zpracovává seznam portfolia.
 * @class PortfolioList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class PortfolioList {

	/**
	 * Stáhne a zpracuje seznam portfolia.
	 * @return Portfolio[] Seznam portfolia
	 */

  static function fetchPortfolioList(){
    $portfolio_list = []; // Seznam portfolia

    $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.locale = :locale
        AND p.visible = 1
      ORDER BY p.size DESC'; // SQL pro stažení veškerého portoflia
    
    $STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Portfolio');
    $STH->execute();
    
    while($portfolio = $STH->fetch()){ /* @var $portfolio Portfolio */ // Prochází jednotlivá portfolia...
      $portfolio->fetchPortfolioGallery(); // Stahuje galerii jednoho portoflia
      
      $portfolio_list[$portfolio->portfolio_id] = $portfolio; // Ukládá portfolio do seznamu
    }

    return $portfolio_list;
  }

}