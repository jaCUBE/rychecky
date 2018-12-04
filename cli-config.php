<?php

require_once 'vendor/autoload.php'; // Načítání tříd přes Composer
require_once 'src/fn.php'; // Helper funkce pro PHP

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Rychecky\Rychecky;

$entityManager = (new Rychecky())->createEntityManager(['dbname' => 'rychecky_doctrine']);

return ConsoleRunner::createHelperSet($entityManager);
