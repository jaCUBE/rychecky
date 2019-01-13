<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="experiences", indexes={
 *     @ORM\Index(name="experiencesIdxDateStart", columns={"dateStart"}),
 *     @ORM\Index(name="experiencesIdxDateEnd", columns={"dateEnd"}),
 *     @ORM\Index(name="experiencesIdxLocale", columns={"locale"}),
 * })
 */
class Experience extends EntityDoctrine
{

    /**
     * @ORM\Column(type="string")
     * @var string Experience type
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     * @var string Title of experience
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     * @var string Origin company
     */
    private $company;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeImmutable Date of experience start
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeImmutable Date of experience end
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="text")
     * @var string Detail description
     */
    private $detail;

    /**
     * @ORM\Column(type="text")
     * @var string Note
     */
    private $note;

    /**
     * Experience constructor.
     * @param array $data Row fetched from database
     * @throws \Exception
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->type = (string)$data['type'];
        $this->title = (string)$data['title'];
        $this->company = (string)$data['company'];
        $this->dateStart = new \DateTimeImmutable($data['dateStart']);
        $this->dateEnd = new \DateTimeImmutable($data['dateEnd']);
        $this->detail = (string)$data['detail'];
        $this->note = (string)$data['note'];
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return \DateTime
     */
    public function getDateStart(): \DateTime
    {
        return $this->dateStart;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd(): \DateTime
    {
        return $this->dateEnd;
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
    public function getNote(): string
    {
        return $this->note;
    }
}
