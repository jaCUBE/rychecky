<?php

/**
 * Manages all experiences entities.
 * @class ExperienceRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Experience;

use Rychecky\Collection;
use Rychecky\Language;
use Rychecky\Repository;

class ExperienceRepository extends Repository
{
    /**
     * Download and process collection of all experiences.
     * @return Collection A collection of experiences
     */
    public function fetchAll(): Collection
    {
        $experienceCollection = new Collection();

        $sql = '
          SELECT e.*
          FROM experience AS e
          WHERE e.locale = :locale
            AND e.visible = 1
          ORDER BY e.date_start DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($row = $STH->fetch()) {
            $experienceCollection->add(new Experience($row));
        }

        return $experienceCollection;
    }
}
