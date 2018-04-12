<?php

require 'bootstrap.php';

Rychecky::view('template.html_header');
Rychecky::view('template.template_header');

$main = new RycheckyController();

Rychecky::view('template.template_footer');
Rychecky::view('template.html_footer');