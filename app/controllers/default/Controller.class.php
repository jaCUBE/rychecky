<?php

/**
 * Základní řadič.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class Controller
 */

class Controller
{
    public $db;

    /**
     * Konstruktor spouští příslušnou metodu řadiče, která odpovídá akci.
     */

    public function __construct()
    {
        $this->connectDatabase();
        $action = Rychecky::action(); // Akce

        if (method_exists($this, $action)) { // Reflexe. Pokud metoda existuje, spustí se.
            $this->$action();
        }
    }


    protected function connectDatabase()
    {
        $this->db = Rychecky::connectDatabase();
    }
}
