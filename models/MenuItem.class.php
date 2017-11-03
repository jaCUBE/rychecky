<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class MenuItem
 * @brief Položka nabídky (menu) webu.
 */

class MenuItem {
  
  /**
   * @brief 
   * @var string $name
   */
  public $name;
  public $name_display;
  public $icon;
  
  
  
  
  /**
   * @brief Generuje URL položky menu.
   * @return string URL
   */
  
  private function url(){
    return URL.'/'.$this->name; // URL
  }
  
  
  private function isActive(){
    return ACTION == $this->name;
  }
  
  
  public function htmlMenuItem(){
    if($this->isActive()){
      $class = 'active';
    }else{
      $class = '';
    }
    
    $text = '<i class="fa '.$this->icon.'"></i> '.$this->name_display;
    
    return '<li class="'.$class.'"><a href="'.$this->url().'">'.$text.'</a></li>';
  }
  
}
