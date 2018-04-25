<?php

/**
 * Trait pro základní záznam z databáze.
 * @class DatabaseRecordTrait
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

trait DatabaseRecordTrait
{
    /**
     * @var integer $row_id ID záznamu
     */
    public $row_id;

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