<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author jaCUBE
 */
class Menu {
  
  /**
   *
   * @var MenuItem $menu_item_list
   */
  public $menu_item_list = Array();
  
  
  public function __construct(){
    $this->generateMenu();
  }
  
  
  
  private function generateMenu(){
    $this->addMenu('Informace', '', 'fa-home');
    $this->addMenu('Dovednosti', 'skills', 'fa-star');
    $this->addMenu('Portfolio', 'portfolio', 'fa-bookmark');
    $this->addMenu('Kontakt', 'contact', 'fa-envelope');
  }
  
  
  private function addMenu($name_display, $name, $icon){
    $item = new MenuItem();
    $item->name = $name;
    $item->name_display = $name_display;
    $item->icon = $icon;
    
    $this->menu_item_list[] = $item;    
  }
}
