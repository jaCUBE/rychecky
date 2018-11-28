<?php

/**
 * Manages all hobbies entities.
 * @class HobbyRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Hobby;

use \PDO;
use Rychecky\Collection;
use Rychecky\Language;
use Rychecky\Repository;

class HobbyRepository extends Repository
{
    /**
     * Fetch and process collection of hobbies.
     * @return \Rychecky\Collection Collection of all hobbies
     */
    public function fetchAll(): Collection
    {
        $hobbyCollection = new Collection();

        $sql = '
            SELECT h.*
            FROM hobby AS h
            WHERE h.locale = :locale
              AND h.visible = 1
            ORDER BY RAND()';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Rychecky\Hobby\Hobby');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($hobby = $STH->fetch()) {
            /* @var $hobby Hobby */
            $hobbyCollection->push($hobby);
        }

        return $hobbyCollection;
    }
}
