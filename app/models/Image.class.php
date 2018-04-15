<?php

/**
 * Jeden obrázek na webu rychecky.cz.
 * @class Image
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Image
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
     * Generuje URL samotného obrázku.
     * @return string URL obrázku
     */

    public function url()
    {
        if (!empty($this->filename)) {
            return URL . '/images/portfolio/' . $this->portfolio_id . '/' . $this->filename; // URL obrázku
        } else {
            return URL . '/images/placeholder.png';
        }
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