<?php

/**
 * Třída, která obsahuje pár důležitých věcích pro běh webu (např. připojení k databázi)
 * @class Rychecky
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Rychecky
{

  /**
   * Vytvoří PDO připojení k databázi v globální proměnné.
   */

  public static function databaseConnect()
  {
    global $_DB;

    try {  // Připojení k databázi pomocí PDO
      $_DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD); // Připojení s konstantami z Wordpressu
      $_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $_DB->query('SET NAMES utf8'); // Česká diakritika. Husa upálili příliš pozdě... :)
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }





  /**
   * Zobrazuje view.
   * @param string $name Název view (např. 'layout.master')
   * @param mixed $data Data potřebná pro vykreslení view
   */

  public static function view(string $name, $data = null)
  {
    $path = 'app/views/'; // Cesta k views
    $filename = str_replace('.', '/', $name).'.view.php'; // Název souboru views

    include $path.$filename; // Načtení view
  }





  /**
   * Poskytuje hodnotu akce z routingu, důležité zejména pro řadič.
   * @return string Hodnota akce
   */

  public static function action(): string
  {
    return $_GET['action'] ?? 'index';
  }
}
