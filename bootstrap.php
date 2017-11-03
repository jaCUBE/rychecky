<?php

include 'autoload.php';
include 'config.php';

include 'libraries/kint/Kint.class.php';

define('LOCALE', Language::getLocale());

global $_RYC;

$_RYC = new Rychecky();
$_RYC->databaseConnect();

$info = new Info();

if(!empty($_GET['action'])){
  define('ACTION', $_GET['action']);
}else{
  define('ACTION', '');
}


function e($cs = '', $en = ''){
  return LOCALE == 'cs' ? $cs : $en;
}