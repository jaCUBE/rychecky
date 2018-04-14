<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 *
 * @class Gallery
 * Obrázek galerie na webu.
 */

class Gallery
{

    /**
     * ID záznamu
     * @var integer $row_id
     */
    public $row_id;

    /**
     * ID zkušenosti k této galerii
     * @var integer $portfolio_id
     */
    public $portfolio_id;

    /**
     * Název souboru
     * @var string $filename
     */
    public $filename;

    /**
     * Popis obrázku
     * @var string $title
     */
    public $title;

    /**
     * Jedná se o thumbnail?
     * @var boolean $thumbnail
     */
    public $thumbnail;

    /**
     * Hodnota pořadí
     * @var integer $order
     */
    public $order;

    /**
     * Viditelný?
     * @var boolean $visible
     */
    public $visible;

    /**
     * Datum a čas přidání záznamu
     * @var string $added
     */
    public $added;

    /**
     * Datum a čas změny záznamu
     * @var string $timestamp
     */
    public $timestamp;

    /**
     * Generuje HTML kód placeholderu obrázku.
     * @return string HTML placeholderu
     */

    public static function htmlPlaceholder()
    {
        return '<img src="' . URL . '/images/placeholder.png" alt="" />'; // HTML placeholderu
    }

    /**
     * Generuje HTML s náhledem obrázku pro Fancybox.
     * @return string HTML náhledu obrázku
     */

    public function htmlFancyBox()
    {
        return '<a href="' . $this->url() . '" data-fancybox="portfolio-' . $this->portfolio_id . '" data-caption="' . htmlspecialchars($this->title) . '" class="fancybox">' . $this->htmlThumbnail() . '</a>'; // HTML náhledu obrázku
    }

    /**
     * Generuje URL samotného obrázku.
     * @return string URL obrázku
     */

    public function url()
    {
        return URL . '/images/portfolio/' . $this->portfolio_id . '/' . $this->filename; // URL obrázku
    }

    /**
     * @briefj Generuje HTML s obrázkem.
     * @return string HTML s obrázkem
     */

    public function htmlThumbnail()
    {
        return '<img src="' . $this->url() . '" alt="" />'; // HTML s obrázkem
    }

    /**
     * Jedná se o náhled obrázku?
     * @return boolean Náhled?
     */

    public function isThumbnail()
    {
        return (boolean)$this->thumbnail; // Náhled?
    }
}
