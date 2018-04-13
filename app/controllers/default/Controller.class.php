<?php

/**
 * Základní řadič.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class Controller
 */

class Controller
{
  /**
   * Konstruktor spouští příslušnou metodu řadiče, která odpovídá akci.
   */

  public function __construct()
  {
    $action = Rychecky::action(); // Akce

    if(method_exists($this, $action)){ // Reflexe. Pokud metoda existuje, spustí se.
      $this->$action();
    }
  }
}
