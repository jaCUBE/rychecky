<?php

/**
 * Manages all hobbies entities.
 * @class HobbyRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Hobby;

use \PDO;
use Rychecky\Language;
use Rychecky\Repository;

class HobbyRepository extends Repository
{

    /**
     * Stáhne a zpracuje seznam koníčků.
     * @return Hobby[] // Seznam koníčků
     */

    public function fetchAll(): array
    {
        $hobbyList = [];

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
            $hobbyList[] = $hobby;
        }

        return $hobbyList;
    }
}
