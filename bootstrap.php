<?php

require 'autoload.php'; // Načítání tříd
require 'config.php'; // Konfigurace
require 'fn.php'; // Helper funkce pro PHP

include 'libraries/kint/Kint.class.php'; // Debugging pro PHP



Rychecky::databaseConnect(); // Vytvoření připojení k databázi
Language::setCookie(Language::getLocale()); // Nastavení zvoleného jazyka do cookies



error_reporting(E_ERROR | E_PARSE);