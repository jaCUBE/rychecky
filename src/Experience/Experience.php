<?php

/**
 * Zkušenost (zaměstnání/vzdělání) na webu.
 * @class Experience
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Experience;

use Rychecky\DatabaseRecordTrait;
use Rychecky\LocalizedTrait;

class Experience
{
    use DatabaseRecordTrait, LocalizedTrait;

    /**
     * @var integer $experience_id ID zkušenosti
     */
    public $experience_id;

    /**
     * @var string $type Typ zkušenosti
     */
    public $type;

    /**
     * @var string $title Název zkušenosti.
     */
    public $title;

    /**
     * @var string $company Společnost
     */
    public $company;

    /**
     * @var string $date_start Datum začátku zkušenosti
     */
    public $date_start;

    /**
     * @var string|boolean $date_end Datum konce zkušenosti
     */
    public $date_end;

    /**
     * @var string $detail Detailní popis zkušenosti
     */
    public $detail;

    /**
     * @var string $note Poznámka
     */
    public $note;
}
