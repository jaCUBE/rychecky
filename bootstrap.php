<?php

require_once 'autoload.php'; // Načítání tříd
require_once 'vendor/autoload.php'; // Načítání tříd přes Composer
require_once 'app/fn.php'; // Helper funkce pro PHP


// Načtení konfigurace před dotenv https://github.com/vlucas/phpdotenv (soubor .env)
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
define('URL', env('URL')); // URL webu jako konstanta



if(env('DEVELOPMENT')){ // Hlášení chyb ve vývojovém prosředí
    Tracy\Debugger::enable(); // Tracy ^_^ https://github.com/nette/tracy
    error_reporting(E_ERROR | E_PARSE);
}else{
    error_reporting(0); // Žádné chyby mimo vývoj
}


Language::setCookie(Language::getLocale()); // Nastavení zvoleného jazyka do cookies