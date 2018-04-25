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
        $portfolio = Portfolio::findById($_GET['portfolio_id']); // Položka portfolia


        ob_start();

        Rychecky::view('ajax/portfolio.ajax', [
            'portfolio' => $portfolio,
            'gallery' => Gallery::portoflioGallery($portfolio->portfolio_id)
        ]);

        $body = ob_get_clean();

        // Výstup v JSON
        echo json_encode([
            'title' => $portfolio->name,
            'body' => $body
        ]);
    }
}