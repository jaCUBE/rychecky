<?php

/**
 * Manages social entities in database.
 * @class SocialRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Social;

use \PDO;
use Rychecky\Repository;

class SocialRepository extends Repository
{
    /**
     * Download and process all social entities in database.
     * @return Social[] List of social entities
     */
    public function fetchAll(): array
    {
        $socialList = [];

        $sql = '
          SELECT s.*
          FROM social AS s
          WHERE s.visible = 1
          ORDER BY s.order DESC, s.name ASC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Social\Social');
        $STH->execute();

        while ($social = $STH->fetch()) { // Prochází jednotlivé sociální sítě...
            /* @var $social Social */
            $socialList[] = $social; // Ukládá sociální síť do pole
        }

        return $socialList;
    }
}
