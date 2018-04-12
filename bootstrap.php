<?php

require 'autoload.php'; // Načítání tříd
include 'vendor/autoload.php'; // Načítání tříd přes Composer

require 'config.php'; // Konfigurace
require 'fn.php'; // Helper funkce pro PHP



Rychecky::databaseConnect(); // Vytvoření připojení k databázi
Language::setCookie(Language::getLocale()); // Nastavení zvoleného jazyka do cookies



error_reporting(E_ERROR | E_PARSE);