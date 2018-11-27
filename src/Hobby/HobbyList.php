<?php

/**
 * Stahuje a zpracovává seznam koníčků.
 * @class HobbyList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Hobby;

use \PDO;
use Rychecky\Language;

class HobbyList
{

    /**
     * Stáhne a zpracuje seznam koníčků.
     * @param PDO $db Připojení k databázi (DI)
     * @return Hobby[] // Seznam koníčků
     */

    public static function all(PDO $db): array
    {
        $hobby_list = []; // Seznam koníčků

        $sql = '
    SELECT h.*
    FROM hobby AS h
    WHERE h.locale = :locale
      AND h.visible = 1
    ORDER BY RAND()'; // SQL dotaz pro stažení koníčků

        $STH = $db->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Rychecky\Hobby\Hobby');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($hobby = $STH->fetch()) { // Prochází jednotlivé koníčky...
            /* @var $hobby Hobby */
            $hobby_list[] = $hobby; // Přidá koníček do seznamu
        }

        return $hobby_list;
    }
}