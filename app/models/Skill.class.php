<?php

/**
 * Jedna dovednost na webu.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class Skill
 */

class Skill
{

    /**
     * @var integer $row_id ID záznamu
     */
    public $row_id;

    /**
     * @var integer $skill_id ID dovednosti
     */
    public $skill_id;

    /**
     * @var string $type Typ dovednosti
     */
    public $type;

    /**
     * @var string $name Název dovednosti
     */
    public $name;

    /**
     * @var integer $value Hodnota dovednosti (0–100)
     */
    public $value;

    /**
     * @var string $detail Detailní popis dovednosti
     */
    public $detail;

    /**
     * @return string $locale Lokalizace (cs/en)
     */
    public $locale;

    /**
     * @var boolean $visible Viditelný?
     */
    public $visible;

    /**
     * @var string $added Datum a čas přidání záznamu
     */
    public $added;

    /**
     * @var string $timestamp Datum a čas změny záznamu
     */
    public $timestamp;
}
