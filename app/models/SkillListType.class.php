<?php

/**
 * Stahuje a zpracovává typy dovedností a jejich počty v databázi.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class SkillListType
 */

class SkillListType
{

    /**
     * Je kontrolovaný typ dovedností ten vybraný? Zvýrazňuje tlačítko.
     * @param string $type Kontrolovaný typ
     * @return bool Je typ vybraný?
     */

    public static function isSelectedType(string $type): bool
    {
        return make_css_name($type) === self::selectedSkillType();
    }

    /**
     * Zjišťuje, jaký je vybraný typ dovedností.
     * @return string Vybraný typ dovedností
     */
    public static function selectedSkillType(): string
    {
        return $_GET['type'] ?? 'webdev';
    }

    /**
     * Stahuje počet jednotlivých typů dovedností v databázi.
     * @param PDO $db Připojení k databázi (DI)
     * @return integer[] Počet typů dovedností v databázi (typ => počet)
     */

    public static function fetchSkillTypeStats(PDO $db): array
    {
        $skill_stats = self::skillList(); // Seznam typů dovedností pro správné řazení

        $sql = '
      SELECT s.type, COUNT(*) AS count
      FROM skill AS s
      WHERE s.locale = :locale
      GROUP BY s.type'; // SQL dotaz pro spočítání typů dovedností

        $STH = $db->prepare($sql);
        $STH->bindParam(':locale', Language::getLocale());
        $STH->execute();

        while ($row = $STH->fetch()) { // Procházení stažených řádků...
            $skill_stats[$row['type']] = $row['count']; // Typ dovednosti => počet
        }

        return $skill_stats;
    }

    /**
     * Poskytuje řazený seznam typů dovedností v poli dle jazyka.
     * @return string[] Seznam typů dovedností
     */

    public static function skillList(): array
    {
        if (Language::getLocale() === 'cs') {
            $skill_type_list = ['Webdev', 'ICT', 'Jazyky', 'Ostatní']; // Seřazený český seznam
        } else {
            $skill_type_list = ['Webdev', 'ICT', 'Languages', 'Others']; // Anglický
        }

        return array_combine($skill_type_list, $skill_type_list); // Vytváří klíče shodné s hodnotami
    }
}
