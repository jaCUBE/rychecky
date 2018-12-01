<?php

/**
 * Manages all skills entities.
 * @class SkillRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Skill;

use Rychecky\Collection;
use Rychecky\Language;
use Rychecky\Repository;

class SkillRepository extends Repository
{
    /**
     * Download all skills by selected type.
     * @param string $type Skill type
     * @return Collection A collection of skills
     */
    public function fetchByType(string $type): Collection
    {
        $skillCollection = new Collection();

        $sql = '
          SELECT s.*
          FROM skill AS s
          WHERE s.type = :type
            AND s.locale = :locale
            AND s.visible = 1
          ORDER BY s.value DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->execute([
            'type' => $type,
            'locale' => Language::getLocale(),
        ]);

        while ($row = $STH->fetch()) {
            $skillCollection->push(new Skill($row));
        }

        return $skillCollection;
    }


    /**
     * Fetch skill types count from database.
     * @return Collection A collection of sill types counts (type => countr)
     */
    public function fetchTypeStats(): Collection
    {
        $skillCollection = new Collection(Skill::getSkillTypesList());

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
            $skillCollection->set($row['type'], (int)$row['count']);
        }

        return $skillCollection;
    }
}
