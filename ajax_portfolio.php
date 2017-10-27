<?php

include 'bootstrap.php';

$output = [];

$p = new Portfolio($_GET['portfolio_id']);
$p->fetchPortfolioGallery();
        
        
$output['title'] = $p->name;
$output['body'] = $p->htmlPortfolioModal();


echo json_encode($output);