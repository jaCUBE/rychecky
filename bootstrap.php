<?php

require_once 'vendor/autoload.php'; // Načítání tříd přes Composer
require_once 'src/fn.php'; // Helper funkce pro PHP

define('ROOT', __DIR__ . '/');

// Načtení konfigurace před dotenv https://github.com/vlucas/phpdotenv (soubor .env)
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
define('URL', env('URL')); // URL webu jako konstanta


// Tracy a chyby pro vývojové/produkční prostředí
if (env('ENVIRONMENT') === 'dev') {
    Tracy\Debugger::enable(Tracy\Debugger::DEVELOPMENT);
    error_reporting(E_ERROR | E_PARSE);
}else{
    Tracy\Debugger::enable(Tracy\Debugger::PRODUCTION);
    error_reporting(0);
}


Rychecky\Language::setCookie(Rychecky\Language::getLocale()); // Nastavení zvoleného jazyka do cookies
