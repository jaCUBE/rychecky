<?php

/**
 * Záznam jednoho odkazu na sociální sítě.
 * @class Social
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Social;

use Rychecky\DatabaseRecordTrait;

class Social
{

    use DatabaseRecordTrait;

    /**
     * @var integer $social_id
     */
    public $social_id;

    /**
     * @var string $name Název sociální sítě
     */
    public $name;

    /**
     * @var string $url URL profilu na síti
     */
    public $url;

    /**
     * @var string $icon Ikona z Font Awesome
     */
    public $icon;

    /**
     * @var string $color HEX kód barvy
     */
    public $color;
}
