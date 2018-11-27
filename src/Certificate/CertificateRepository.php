<?php

/**
 * Stahuje a zpracovává seznam certifikátů.
 * @class CertificateRepository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Certificate;

use \PDO;
use Rychecky\Language;
use Rychecky\Repository;

class CertificateRepository extends Repository
{

    /**
     * Stáhne a zpracuje seznam certifikátů z databáze.
     * @return Certificate[] Seznam certifikátů
     */

    public function fetchAll(): array
    {
        $certificateList = [];

        $sql = '
            SELECT c.*
            FROM certificate AS c
            WHERE c.locale = :locale
              AND c.visible = 1
            ORDER BY c.issue_date DESC';

        $STH = $this->getDb()->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, '\Rychecky\Certificate\Certificate');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($certificate = $STH->fetch()) {
            /* @var $certificate Certificate */
            $certificateList[] = $certificate;
        }

        return $certificateList;
    }
}
