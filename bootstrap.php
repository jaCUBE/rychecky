<?php

include 'autoload.php';
include 'config.php';

include 'libraries/kint/Kint.class.php';

define('LOCALE', Language::getLocale());


Rychecky::databaseConnect();

$info = new Info();

if(!empty($_GET['action'])){
  define('ACTION', $_GET['action']);
}else{
  define('ACTION', '');
}


function e($cs = '', $en = ''){
  return LOCALE == 'cs' ? $cs : $en;
}