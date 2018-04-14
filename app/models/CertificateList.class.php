<?php

/**
 * Stahuje a zpracovává seznam certifikátů.
 * @class CertificateList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */


class CertificateList
{

    /**
     * Stáhne a zpracuje seznam certifikátů z databáze.
     * @return Certificate[] Seznam certifikátů
     */

    public static function fetchCertificateList(): array
    {
        $certificate_list = []; // Seznam certifikátů

        $sql = '
    SELECT c.*
    FROM certificate AS c
    WHERE c.locale = :locale
      AND c.visible = 1
    ORDER BY c.issue_date DESC'; // SQL pro stažení certifikátů

        $STH = db()->prepare($sql);
        $STH->bindParam(':locale', Language::getLocale());
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Certificate');
        $STH->execute();

        while ($certificate = $STH->fetch()) { // Prochází certifikáty...
            /* @var $certificate Certificate */
            $certificate_list[] = $certificate; // Uloží certifikát do pole
        }

        return $certificate_list;
    }
}
