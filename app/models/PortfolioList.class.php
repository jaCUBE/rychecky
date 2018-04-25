<?php

/**
 * Stahuje a zpracovává seznam portfolia.
 * @class PortfolioList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class PortfolioList
{

    /**
     * Stáhne a zpracuje seznam portfolia.
     * @return Portfolio[] Seznam portfolia
     */

    public static function all(): array
    {
        $portfolio_list = []; // Seznam portfolia

        $sql = '
        SELECT p.*
        FROM portfolio AS p
        WHERE p.locale = :locale
          AND p.visible = 1
        GROUP BY p.portfolio_id
        ORDER BY p.size DESC'; // SQL pro stažení veškerého portoflia

        $STH = db()->prepare($sql);
        $STH->bindParam(':locale', Language::getLocale());
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Portfolio');
        $STH->execute();

        while ($portfolio = $STH->fetch()) {  // Prochází jednotlivá portfolia...
            /* @var $portfolio Portfolio */
            $portfolio_list[] = $portfolio; // Ukládá portfolio do seznamu
        }

        return $portfolio_list;
    }
}
