<?php

include 'controllers/RycheckyController.class.php';

function __autoload($classname){
  $path = 'models/';
  $file = $classname.'.class.php';
  
  include $path.$file;
}