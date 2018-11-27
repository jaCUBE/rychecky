<?php

/**
 * Stahuje a zpracovává seznam zkušeností (práce/vzdělání).
 * @class ExperienceRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Experience;

use \PDO;
use Rychecky\Language;
use Rychecky\Repository;

class ExperienceRepository extends Repository
{

    /**
     * Stáhne a zpracuje seznam zkušeností (práce/vzdělání).
     * @return Experience[] Seznam zkušeností
     */

    public function fetchAll(): array
    {
        $experienceList = [];

        $sql = '
          SELECT e.*
          FROM experience AS e
          WHERE e.locale = :locale
            AND e.visible = 1
          ORDER BY e.date_start DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Experience\Experience');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($experience = $STH->fetch()) {
            /* @var $experience Experience */
            $experienceList[] = $experience;
        }

        return $experienceList;
    }
}
