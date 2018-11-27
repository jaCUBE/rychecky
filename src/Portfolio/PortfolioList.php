<?php

/**
 * Stahuje a zpracovává seznam portfolia.
 * @class PortfolioList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Portfolio;

use \PDO;
use Rychecky\Language;
use Rychecky\Gallery\Gallery;

class PortfolioList
{

    /**
     * Stáhne a zpracuje seznam portfolia.
     * @param PDO $db Připojení k databázi (DI)
     * @return Portfolio[] Seznam portfolia
     */

    public static function all(PDO $db): array
    {
        $portfolio_list = []; // Seznam portfolia

        $sql = '
        SELECT p.*
        FROM portfolio AS p
        WHERE p.locale = :locale
          AND p.visible = 1
        GROUP BY p.portfolio_id
        ORDER BY p.size DESC'; // SQL pro stažení veškerého portoflia

        $STH = $db->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Portfolio\Portfolio');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($portfolio = $STH->fetch()) {  // Prochází jednotlivá portfolia...
            /* @var $portfolio Portfolio */
            $portfolio_list[] = [
                'data' => $portfolio,
                'thumbnail' => Gallery::portfolioThumbnail($db, $portfolio->portfolio_id)
            ];
        }

        return $portfolio_list;
    }

}
