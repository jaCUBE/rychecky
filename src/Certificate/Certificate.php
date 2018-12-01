<?php

/**
 * Certificate entity.
 * @class Certificate
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Certificate;

use Rychecky\DatabaseRecordTrait;
use Rychecky\LocalizedTrait;

class Certificate
{
    use DatabaseRecordTrait, LocalizedTrait;

    /**
     * @var int $certificateId Certificate ID
     */
    private $certificateId;

    /**
     * @var string $type Certificate type
     */
    private $type;

    /**
     * @var string $name Certificate name
     */
    private $name;

    /**
     * @var string $detail Detailed description of certificate
     */
    private $detail;

    /**
     * @var string $issueDate Date of certificate issue
     */
    private $issueDate;

    /**
     * @var string $issueBy Issuer of certificate
     */
    private $issueBy;

    /**
     * @var string $url Certifcate URL
     */
    private $url;

    /**
     * Certificate constructor.
     * @param array $data Entity row fetched from database
     */
    public function __construct(array $data = [])
    {
        $this->certificateId = (int)$data['certificate_id'];
        $this->type = (string)$data['type'];
        $this->name = (string)$data['name'];
        $this->detail = (string)$data['detail'];
        $this->issueDate = (string)$data['isser_date'];
        $this->issueBy = (string)$data['issue_by'];
        $this->url = (string)$data['url'];
    }

    /**
     * @return int
     */
    public function getCertificateId(): int
    {
        return $this->certificateId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @return string
     */
    public function getIssueDate(): string
    {
        return $this->issueDate;
    }

    /**
     * @return string
     */
    public function getIssueBy(): string
    {
        return $this->issueBy;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
