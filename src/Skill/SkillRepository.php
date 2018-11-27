<?php

/**
 * Stahuje a zpracovává seznam dovedností.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class SkillRepository
 */

namespace Rychecky\Skill;

use \PDO;
use Rychecky\Language;
use Rychecky\Repository;

class SkillRepository extends Repository
{

    /**
     * Download all skills by selected type.
     * @param string $type Skill type
     * @return Skill[] A list of skills by type
     */
    public function fetchByType(string $type): array
    {
        $skillList = [];

        $sql = '
          SELECT s.*
          FROM skill AS s
          WHERE s.type = :type
            AND s.locale = :locale
            AND s.visible = 1
          ORDER BY s.value DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Rychecky\Skill\Skill');
        $STH->execute([
            'type' => $type,
            'locale' => Language::getLocale(),
        ]);

        while ($skill = $STH->fetch()) {
            /* @var $skill Skill */
            $skillList[] = $skill;
        }

        return $skillList;
    }


    /**
     * Fetch skill types count from database.
     * @return int[] Skill types counts (type => countr)
     */
    public function fetchTypeStats(): array
    {
        $skillStats = Skill::getSkillTypesList(); // Ordered list of skill types

        $sql = '
          SELECT s.type, COUNT(*) AS count
          FROM skill AS s
          WHERE s.locale = :locale
          GROUP BY s.type';

        $STH = $this->getDb()->prepare($sql);
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($row = $STH->fetch()) {
            $skillStats[$row['type']] = $row['count']; // Skill type => count
        }

        return $skillStats;
    }
}
