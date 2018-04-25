<?php

include 'app/controllers/default/Controller.class.php'; // Obecný řadič


spl_autoload_register('rychecky_autoloader'); // Registrace autoloaderu



/**
 * Automaticky načte neznámé třídy dle názvu.
 * @param $classname Název třídy
 */

function rychecky_autoloader(string $classname)
{
    if (preg_match('/.+(Controller)$/', $classname)) { // Řadiče
        $folder = 'controllers';
        $suffix = '.class.php';
    } elseif (preg_match('/.+Trait$/', $classname)) { // Traity
        $folder = 'traits';
        $suffix = '.trait.php';
    } else { // Standardní modely
        $folder = 'models';
        $suffix = '.class.php';
    }

    $filepath = 'app/' . $folder . '/' . $classname . $suffix; // Cesta ke třídě

    include $filepath; // Načte třídu
}