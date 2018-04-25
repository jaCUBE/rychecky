<?php

/**
 * Třída, která obsahuje pár důležitých věcích pro běh webu (např. připojení k databázi)
 * @class Rychecky
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Rychecky
{
    /**
     * Zobrazuje view pomocí Latte.
     * @param string $name Název view
     * @param array  $data Potřebná data v poli
     */

    public static function view(string $name, array $data): void
    {
        $latte = new Latte\Engine;
        $latte->setTempDirectory('temp');

        $data['locale'] = Language::getLocale(); // Jazyk pro každý view

        $filepath = 'app/views/' . $name . '.latte';
        $latte->render($filepath, (array)$data);
    }


    /**
     * Poskytuje hodnotu akce z routingu, důležité zejména pro řadič.
     * @return string Hodnota akce
     */

    public static function action(): string
    {
        return $_GET['action'] ?? 'index';
    }


    /**
     * Poskytuje celou adresu (ulice, číslo popisné, PSČ, město).
     * @return string Celá adresa
     */

    public static function fullAddress(): string
    {
        return env('ADDR_STREET') . ' ' . env('ADDR_STREET_NUMBER') . ', ' . env('ADDR_ZIP') . ' ' . env('ADDR_CITY');
    }

}