<?php

include 'app/controllers/default/Controller.class.php'; // Obecný řadič
include 'app/controllers/RycheckyController.class.php'; // Řadič pro web
include 'app/controllers/AjaxController.class.php'; // Řadič pro AJAX


spl_autoload_register('rychecky_autoloader'); // Registrace autoloaderu



/**
 * Automaticky načte neznámé třídy dle názvu.
 * @param $classname Název třídy
 */

function rychecky_autoloader($classname){
  $filepath = 'app/models/'.$classname.'.class.php'; // Cesta ke třídě
  include $filepath; // Načte třídu
}