<?php

include 'controllers/default/Controller.class.php'; // Obecný řadič
include 'controllers/RycheckyController.class.php'; // Řadič pro web



spl_autoload_register('rychecky_autoloader'); // Registrace autoloaderu



/**
 * Automaticky načte neznámé třídy dle názvu.
 * @param $classname Název třídy
 * @return boolean Existuje soubor?
 */

function rychecky_autoloader($classname){
  $filepath = 'models/'.$classname.'.class.php'; // Cesta ke třídě
  include $filepath; // Načte třídu

  return file_exists($filepath); // Existuje soubor se třídou?
}