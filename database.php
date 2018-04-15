<?php

global $_DB;

try {  // Připojení k databázi pomocí PDO
    $dsn = 'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_NAME');
    $_DB = new PDO($dsn, env('DB_USER'), env('DB_PASSWORD')); // Připojení s konstantami z Wordpressu
    $_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $_DB->query('SET NAMES utf8'); // Česká diakritika. Husa upálili příliš pozdě... :)
} catch (PDOException $e) {
    echo $e->getMessage();
}