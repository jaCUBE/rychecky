<?php

/**
 * Řadič obsluhuje základní AJAX požadavky.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class AjaxController
 */

class AjaxController extends Controller
{

    /**
     * Vypisuje JSON na AJAX požadavek pro informace konkrétní položky portfolia.
     */
    public function portfolio()
    {
        $portofilo = Portfolio::findById($_GET['portfolio_id']); // Položka portfolia

        ob_start();
        Rychecky::view('portfolio.ajax', $portofilo); // View s obsahem AJAX

        // Výstup v JSON
        $json = [
            'title' => $portofilo->name,
            'body' => ob_get_clean() // HTML z bufferu
        ];

        echo json_encode($json);
    }
}