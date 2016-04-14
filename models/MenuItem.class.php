<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuItem
 *
 * @author jaCUBE
 */
class MenuItem {
  public $name;
  public $name_display;
  public $icon;
  
  
  
  private function url(){
    return URL.'/'.$this->name;
  }
  
  
  private function isActive(){
    if(ACTION == $this->name){
      return true;
    }else{
      return false;
    }
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
