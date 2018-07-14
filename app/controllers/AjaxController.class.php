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
    public function portfolio(): void
    {
        $portfolio = Portfolio::findById($this->db, $_GET['portfolio_id']); // Položka portfolia


        ob_start();

        Rychecky::view('ajax/portfolio.ajax', [
            'portfolio' => $portfolio,
            'thumbnail' => Gallery::portfolioThumbnail($this->db, $portfolio->portfolio_id),
            'gallery' => Gallery::portoflioGallery($this->db, $portfolio->portfolio_id)
        ]);

        $body = ob_get_clean();

        // Výstup v JSON
        echo json_encode([
            'title' => $portfolio->name,
            'body' => $body
        ]);
    }
}