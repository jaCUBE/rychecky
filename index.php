<?php

include 'bootstrap.php';


$_RYC->view('html_header');
$_RYC->view('template_header');


$main = new RycheckyController();


$_RYC->view('template_footer');
$_RYC->view('html_footer');