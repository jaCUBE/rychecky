<?php

include 'autoload.php';
include 'config.php';

global $_RYC;

$_RYC = new Rychecky();
$_RYC->databaseConnect();


if(!empty($_GET['action'])){
  define('ACTION', $_GET['action']);
}else{
  define('ACTION', '');
}