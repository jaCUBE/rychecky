<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Menu
 * @brief Vytváří vše potřebné pro nabídku webu.
 */

class Menu {
  
  /**
   * @brief Seznam položek nabídky webu
   * @var MenuItem $menu_item_list
   */
  public $menu_item_list = [];
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Konstruktor, generuje menu.
   * @return void
   */
  
  public function __construct(){
    $this->generateMenu(); // Generuje menu
  }
  
  
  
  
  
  /**
   * @brief Generuje všechny položky menu.
   * @return void
   */
  
  private function generateMenu(){
    $this->addMenu('', e('Informace', 'Information'), 'fa-home');
    $this->addMenu('skills', e('Dovednosti', 'Skills'), 'fa-database');
    $this->addMenu('portfolio', 'Portfolio', 'fa-bookmark');
    $this->addMenu('experiences', e('Zkušenosti', 'Experiences'), 'fa-briefcase');
    $this->addMenu('certificate', e('Certifikace', 'Certificates'), 'fa-certificate');
    $this->addMenu('contact', e('Kontakt', 'Contact'), 'fa-envelope');
  }
  
  
  
  
  
  /**
   * @brief Přidává jednu položku menu do seznamu.
   * @param string $name Název položky (slug)
   * @param string $name_display Název položky (verbose)
   * @param string $icon Font Awesome icon
   * @return void
   */
  
  private function addMenu($name, $name_display, $icon){
    $mi = new MenuItem(); // Položka menu
    $mi->name = $name; // Nastavení názvu
    $mi->name_display = $name_display; // Nastavení názvu (verbose)
    $mi->icon = $icon; // Font Awesome ikona
    
    $this->menu_item_list[] = $mi; // Přidání jedné položky do seznamu
  }
  
  
}