<?php

/**
 * Returns one of two strings accordign to selected language.
 * @param string $cs String for Czech (cs)
 * @param string $en String for English (en)
 * @return string Final string
 */
function e(string $cs = '', string $en = ''): string
{
    return \Rychecky\Language::getLocale() === 'cs' ? $cs : $en;
}

/**
 * Remove Czech accute characters from a string.
 * @param string $string String with Czech characters
 * @return string String with removed czech characters
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
        'ü',
    ];
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
        'u',
    ];

    return str_replace($original, $replace, $string);
}

/**
 * Transform any string to CSS name (lowercase, no accuted chars, replaced spaces...)
 * @param string $string String to make CSS name
 * @return string CSS-like name for class/id
 */
function make_css_name(string $string): string
{
    $string = replace_czech_characters($string);

    // Replace other special chars
    $original = [':', '.', '/', ' ', '(', ')', ',', '[', ']', '_'];
    $replace = ['', '-', '-', '-', '-', '-', '', '-', '', '-'];
    $string = str_replace($original, $replace, $string);

    $string = mb_strtolower($string);

    return $string;
}

/**
 * Generate JS/CSS URL with hash in GET against caching.
 * @param string $asset Filepath to CSS/JS
 * @return string URL with a SHA1 hash of file
 */
function asset_with_hash(string $asset): string
{
    return URL . '/' . $asset . '?sha1=' . sha1_file($asset);
}

/**
 * Get environment value (getenv() alternative).
 * @param string $name Environment property name
 * @return string Enviroment property value
 */
function env(string $name): string
{
    $value = $_ENV[$name] ?? $_SERVER[$name];
    return (string)$value;
}
