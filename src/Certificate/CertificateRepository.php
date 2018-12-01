<?php

/**
 * Manages all certificate entities.
 * @class CertificateRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Certificate;

use Rychecky\Collection;
use Rychecky\Language;
use Rychecky\Repository;

class CertificateRepository extends Repository
{
    /**
     * Fetch and process collection of all certificates from data source.
     * @return \Rychecky\Collection A collection of all certificates
     */
    public function fetchAll(): Collection
    {
        $certificateCollection = new Collection();

        $sql = '
            SELECT c.*
            FROM certificate AS c
            WHERE c.locale = :locale
              AND c.visible = 1
            ORDER BY c.issue_date DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($row = $STH->fetch()) {
            $certificateCollection->add(new Certificate($row));
        }

        return $certificateCollection;
    }
}
