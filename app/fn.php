<?php

/**
 * Vypisuje jeden ze dvou řetězců dle jazyka.
 * @param string $cs Řetězec pro českou mutaci
 * @param string $en Řetězec pro anglickou mutaci
 * @return string Výsledný řetězec
 */

function e(string $cs = '', string $en = ''): string
{
    return Language::getLocale() == 'cs' ? $cs : $en;
}


/**
 * Odstranění české diakritiky z řetězce v parametru.
 * @param string $string Název s předpokládanou diakritikou
 * @return string Řetězec s odstraněnou diakritikou
 */

function replace_czech_characters(string $string): string
{
    $original = [
        'á',
        'č',
        'ď',
        'é',
        'ě',
        'í',
        'ľ',
        'ň',
        'ó',
        'ř',
        'š',
        'ť',
        'ú',
        'ů',
        'ý',
        'ž',
        'Á',
        'Č',
        'Ď',
        'É',
        'Ě',
        'Í',
        'Ľ',
        'Ň',
        'Ó',
        'Ř',
        'Š',
        'Ť',
        'Ú',
        'Ů',
        'Ý',
        'Ž',
        'ö',
        'ü'
    ]; // Česká diakritika
    $replace = [
        'a',
        'c',
        'd',
        'e',
        'e',
        'i',
        'l',
        'n',
        'o',
        'r',
        's',
        't',
        'u',
        'u',
        'y',
        'z',
        'A',
        'C',
        'D',
        'E',
        'E',
        'I',
        'L',
        'N',
        'O',
        'R',
        'S',
        'T',
        'U',
        'U',
        'Y',
        'Z',
        'o',
        'u'
    ]; // Znaky bez diakritiky

    return str_replace($original, $replace, $string); // Vrací řetězec s odstraněnou diakritikou
}


/**
 * Převádí pole ve formátu 'atribut => hodnota' na CSS.
 * @param $array Pole 'atribut => hodnota'
 * @return string Výsledné CSS
 */

function array_to_css(array $array): string
{
    $css = '';

    foreach ($array as $property => $value) {
        $css .= $property . ': ' . $value . ';';
    }

    return $css;
}


/**
 * Převádí řetěžec do formátu názvu CSS třídy.   *
 * @param string $string Vstup k přípravě na CSS třídu.
 * @return string Formátovaný řetězec na CSS třídu.
 */

function make_css_name(string $string): string
{
    $string = replace_czech_characters($string); // Odstranění diakritiky

    $original = [':', '.', '/', ' ', '(', ')', ',', '[', ']', '_'];
    $replace = ['', '-', '-', '-', '-', '-', '', '-', '', '-'];

    $string = str_replace($original, $replace, $string);
    $string = mb_strtolower($string);

    return $string;
}


/**
 * Generuje odkaz na JS/CSS soubor společně s jeho hashem v GET kvůli cache.
 * @param string $asset Cesta k JS/CSS souboru
 * @return string URL společně s hashem souboru
 */

function asset_with_hash(string $asset): string
{
    return URL . '/' . $asset . '?sha1=' . sha1_file($asset);
}


/**
 * Získává hodnotu proměnné prostředí dle názvu (alternativa k getenv(), které fungovalo divně).
 * @param string $name Název proměnné prostředí
 * @return string Hodnota proměnné prostředí
 */

function env(string $name): string
{
    return (string)$_ENV[$name] ?? $_SERVER[$name]; // $_ENV má přednost
}


/**
 * Poskytuje objekt PDO s připojením k databázi.
 * @return PDO Objekt připojení k databázi přes PDO
 */

function db(): PDO
{
    global $_DB;
    return $_DB;
}