<?php

/**
 * Trait pro lokalizovaný záznam v databázi.
 * @class LocalizedTrait
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */


trait LocalizedTrait
{
    /**
     * @var string $locale Lokalizace (cs/en)
     */
    public $locale;


    /**
     * Je tento objekt shodný se zvoleným jazykem?
     * @return bool Shodný se zvoleným jazykem?
     */

    public function isLocaleRight()
    {
        return $this->locale == Language::getLocale();
    }
}