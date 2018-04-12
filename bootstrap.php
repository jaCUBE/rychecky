<?php

require 'autoload.php'; // Načítání tříd
require 'config.php'; // Konfigurace
require 'fn.php'; // Helper funkce pro PHP

include 'libraries/kint/Kint.class.php'; // Debugging pro PHP





define('LOCALE', Language::getLocale()); // Nastavení jazyka webu

Rychecky::databaseConnect(); // Vytvoření připojení k databázi

$info = new Info();

