<?php

/**
 * @brief Funkce pro vypisování dvou řetězců dle jazyka.
 * @param string $cs Řetězec pro českou mutaci
 * @param string $en Řetězec pro anglickou mutaci
 * @return string Výsledný řetězec
 */

function e($cs = '', $en = ''){
	return LOCALE == 'cs' ? $cs : $en;
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