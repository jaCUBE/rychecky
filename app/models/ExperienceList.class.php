<?php

/**
 * Stahuje a zpracovává seznam zkušeností (práce/vzdělání).
 * @class ExperienceList
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */


class ExperienceList
{

    /**
     * Stáhne a zpracuje seznam zkušeností (práce/vzdělání).
     * @param PDO $db Připojení k databázi (DI)
     * @return Experience[] Seznam zkušeností
     */

    public static function all(PDO $db): array
    {
        $experience_list = []; // Seznam zkušeností

        $sql = '
      SELECT e.*
      FROM experience AS e
      WHERE e.locale = :locale
        AND e.visible = 1
      ORDER BY e.date_start DESC'; // SQL pro stažení seznamu zkušeností

        $STH = $db->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Experience');
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($e = $STH->fetch()) { // Prochá jednotlivé zkušenosti...
            /* @var $e Experience */
            $experience_list[] = $e; // Uloží zkušenost do pole
        }

        return $experience_list;
    }
}
