<?php

/**
 * Manages social links entities in database.
 * @class SocialRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Social;

use \PDO;
use Rychecky\Collection;
use Rychecky\Repository;

class SocialRepository extends Repository
{
    /**
     * Download and process all social entities in database.
     * @return Collection A collection of social links
     */
    public function fetchAll(): Collection
    {
        $socialCollection = new Collection();

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
            $socialCollection->push($social);
        }

        return $socialCollection;
    }
}
