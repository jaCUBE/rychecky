<?php

/**
 * Certifikát na webu.
 * @class Certificate
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Certificate
{

    use DatabaseRecordTrait, LocalizedTrait;

    /**
     * @var integer $certificate_id ID certifikátu
     */
    public $certificate_id;

    /**
     * @var string $type Typ certifikátu
     */
    public $type;

    /**
     * @var string $name Název certifikátu
     */
    public $name;

    /**
     * @var string $detail Detailní popis certifikátu
     */
    public $detail;

    /**
     * @var string $issue_date Datum vydání certifikátu
     */
    public $issue_date;

    /**
     * @var string $issue_by Vydavatel certifikátu
     */
    public $issue_by;

    /**
     * @var string $url URL certifikátu
     */
    public $url;
}
