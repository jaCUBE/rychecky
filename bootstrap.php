<?php

include 'autoload.php';
include 'config.php';

include 'libraries/kint/Kint.class.php';

global $_RYC;

$_RYC = new Rychecky();
$_RYC->databaseConnect();

$info = new Info();

if(!empty($_GET['action'])){
  define('ACTION', $_GET['action']);
}else{
  define('ACTION', '');
}