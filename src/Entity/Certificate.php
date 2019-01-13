<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="certificates", indexes={
 *     @ORM\Index(name="certificatesIdxLocale", columns={"locale"}),
 * })
 */
class Certificate extends EntityDoctrine
{
    /**
     * @ORM\Column(type="string")
     * @var string Certificate type
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     * @var string Certificate name
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @var string Detailed description of certificate
     */
    private $detail;

    /**
     * @ORM\Column(type="datetime")
     * @var string Date of certificate issue
     */
    private $issueDate;

    /**
     * @ORM\Column(type="string")
     * @var string Issuer of certificate
     */
    private $issueBy;

    /**
     * @ORM\Column(type="string")
     * @var string Certifcate URL
     */
    private $url;

    /**
     * Certificate constructor.
     * @param array $data Row fetched from database
     * @throws \Exception
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
    public function getIssueDate(): \DateTime
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
