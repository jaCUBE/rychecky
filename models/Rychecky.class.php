<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rychecky
 *
 * @author jaCUBE
 */
class Rychecky {
  
  
  public function view($name, $data = NULL){
    $path = 'views/';
    $file = $name.'.view.php';
    
    if(preg_match('/^(html|template)_/', $name)){
      $path .= 'template/';
    }
    
    include $path.$file;    
  }
  
  
  
}
