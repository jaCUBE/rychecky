<?php

/**
 * @brief Funkce pro vypisování dvou řetězců dle jazyka.
 * @param string $cs Řetězec pro českou mutaci
 * @param string $en Řetězec pro anglickou mutaci
 * @return string Výsledný řetězec
 */

function e($cs = '', $en = ''){
	return Language::getLocale() == 'cs' ? $cs : $en;
}





/**
 * @brief Funkce poskytuje objekt PDO s připojením k databázi.
 * @return PDO Objekt PDO
 */

function db(){
	global $_DB;
	return $_DB;
}





/**
 * @brief Nastavuje kontan
 */

function action(){
	return $_GET['action'] ?? 'index';
}


function locale(){
	return Language::getLocale();
}



/**
 * @brief Odstranění české diakritiky z řetězce v parametru.
 * @param string $string Název s předpokládanou diakritikou
 * @return string Řetězec s odstraněnou diakritikou
 */

function replace_czech_characters($string){
	$original = [ 'á', 'č', 'ď', 'é', 'ě', 'í', 'ľ', 'ň', 'ó', 'ř', 'š', 'ť', 'ú', 'ů', 'ý', 'ž',
			'Á', 'Č', 'Ď', 'É', 'Ě', 'Í', 'Ľ', 'Ň', 'Ó', 'Ř', 'Š', 'Ť', 'Ú', 'Ů', 'Ý', 'Ž',
			'ö', 'ü']; // Česká diakritika
	$replace  = [ 'a', 'c', 'd', 'e', 'e', 'i', 'l', 'n', 'o', 'r', 's', 't', 'u', 'u', 'y', 'z',
			'A', 'C', 'D', 'E', 'E', 'I', 'L', 'N', 'O', 'R', 'S', 'T', 'U', 'U', 'Y', 'Z',
			'o', 'u']; // Znaky bez diakritiky

	return str_replace($original, $replace, $string); // Vrací řetězec s odstraněnou diakritikou
}


function array_to_css($array){
	$css = '';

	foreach($array as $property => $value){
		$css .= $property.': '.$value.';';
	}

	return $css;
}





/**
 * @brief Převádí řetěžec do formátu názvu CSS třídy.   *
 * @param string $string Vstup k přípravě na CSS třídu.
 * @return string Formátovaný řetězec na CSS třídu.
 */

function make_css_name($string){
	$string = replace_czech_characters($string);

	$original = [':', '.', '/', ' ', '(', ')', ',', '[', ']', '_'];
	$replace  = ['', '-', '-', '-', '-', '-', '', '-', '', '-'];

	$string = str_replace($original, $replace, $string);
	$string = mb_strtolower($string);

	return $string;
}  