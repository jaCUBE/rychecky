<?php

/**
 * Jedna dovednost na webu.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class Skill
 */

class Skill
{

    use DatabaseRecordTrait, LocalizedTrait;

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
}
