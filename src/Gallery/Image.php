<?php

/**
 * Jeden obrázek na webu rychecky.cz.
 * @class Image
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Gallery;

use Rychecky\DatabaseRecordTrait;

class Image
{

    use DatabaseRecordTrait;

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
     * Generuje URL samotného obrázku.
     * @return string URL obrázku
     */

    public function url(): string
    {
        if (!empty($this->filename)) {
            return URL . '/images/portfolio/' . $this->portfolio_id . '/' . $this->filename; // URL obrázku
        }

        return URL . '/images/placeholder.png';
    }

    /**
     * Jedná se o náhled obrázku?
     * @return boolean Náhled?
     */

    public function isThumbnail(): bool
    {
        return (boolean)$this->thumbnail; // Náhled?
    }

}