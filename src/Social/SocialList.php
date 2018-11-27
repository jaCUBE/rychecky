<?php

/**
 * Stahuje a zpracovává seznam ikonek sociálních sítí.
 * @class SocialList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Social;

use \PDO;

class SocialList
{

    /**
     * Stáhne a zpracuje seznam ikonek sociálních sítí.
     * @param \PDO $db Připojení k databázi (DI)
     * @return Social[] Seznam sociálních sítí
     */
    public static function all(PDO $db): array
    {
        $social_list = []; // Seznam sociálních sítí

        $sql = '
      SELECT s.*
      FROM social AS s
      WHERE s.visible = 1
      ORDER BY s.order DESC, s.name ASC'; // SQL pro stažení sociálních sítí

        $STH = $db->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Social\Social');
        $STH->execute();

        while ($social = $STH->fetch()) { // Prochází jednotlivé sociální sítě...
            /* @var $social Social */
            $social_list[] = $social; // Ukládá sociální síť do pole
        }

        return $social_list;
    }
}
