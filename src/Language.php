<?php

/**
 * Poskytuje vše potřebné ke správě jazyků webu.
 * @class Language
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

class Language
{

    /**
     * Zjišťuje právě zapntuý jazyk.
     * @return string Kód zapnutého jazyku ISO 639-1
     */

    public static function getLocale(): string
    {
        if (!empty($_GET['locale'])) { // Jazyk se právě přepíná...
            $locale = $_GET['locale'];
        } elseif (self::getCookie()) { // Jazyk je uložení v cookies...
            $locale = self::getCookie();
        } else {
            $locale = self::getBrowserLocale(); // Fallback: jazyk prohlížeče
        }

        return $locale === 'cs' ? 'cs' : 'en'; // Nejde mít nic jiného než 'cs' a 'en'
    }

    /**
     * Získává kód jazyku nastaveného v cookies (je-li).
     * @return string Kód jazyku ISO 639-1
     */

    public static function getCookie(): string
    {
        return (string)@$_COOKIE['locale'];
    }

    /**
     * Zjišťuje jazyk prohlížeče návštěvníka.
     * @return string Kód jazyku prohlížeče ISO 639-1
     */

    public static function getBrowserLocale(): string
    {
        $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // Jazyk prohlížeče

        return $locale === 'cs' ? 'cs' : 'en'; // Nejde mít nic jiného než 'cs' a 'en'
    }

    /**
     * Nastavuje cookie jazyku webové stránky.
     * @param string $locale Kód jazyku ISO 639-1
     */

    public static function setCookie(string $locale = 'cs'): void
    {
        $expire = time() + 14 * 24 * 60 * 60; // Platnost
        setcookie('locale', $locale, $expire, '/');
    }
}
