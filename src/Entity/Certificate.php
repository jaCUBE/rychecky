<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="certificates", indexes={
 *     @ORM\Index(name="certificate_idx_locale", columns={"locale"}),
 * })
 */
class Certificate extends EntityDoctrine
{
    /**
     * @ORM\Column(type="string")
     * @var string $type Certificate type
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     * @var string $name Certificate name
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string $detail Detailed description of certificate
     */
    private $detail;

    /**
     * @ORM\Column(type="datetime")
     * @var string $issueDate Date of certificate issue
     */
    private $issueDate;

    /**
     * @ORM\Column(type="string")
     * @var string $issueBy Issuer of certificate
     */
    private $issueBy;

    /**
     * @ORM\Column(type="string")
     * @var string $url Certifcate URL
     */
    private $url;

    /**
     * Certificate constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->type = (string)$data['type'];
        $this->name = (string)$data['name'];
        $this->detail = (string)$data['detail'];
        $this->issueDate = new \DateTimeImmutable($data['issueDate']);
        $this->issueBy = (string)$data['issueBy'];
        $this->url = (string)$data['url'];
        $this->locale = (string)$data['locale'];
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
