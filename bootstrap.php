<?php

require 'autoload.php'; // Načítání tříd
require 'config.php'; // Konfigurace
require 'app/fn.php'; // Helper funkce pro PHP


if(DEVELOPMENT){ // Načtení nástrojů pro vývoj
	include 'vendor/autoload.php'; // Načítání tříd přes Composer
	Tracy\Debugger::enable(); // Tracy ^_^ https://github.com/nette/tracy
}


Rychecky::databaseConnect(); // Vytvoření připojení k databázi
Language::setCookie(Language::getLocale()); // Nastavení zvoleného jazyka do cookies


if(DEVELOPMENT){ // Hlášení chyb ve vývojovém prosředí
	error_reporting(E_ERROR | E_PARSE);
}else{
	error_reporting(0); // Žádné chyby mimo vývoj
}