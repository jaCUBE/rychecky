<?php

namespace Rychecky\Hobby;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="portfolio", indexes={
 *     @ORM\Index(name="portfolioIdxLocale", columns={"locale"}),
 * })
 */
class Portfolio extends EntityDoctrine
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nameShort;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $detail;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $detailShort;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $company;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $url;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @var \DateTimeImmutable
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @var \DateTimeImmutable
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $size;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $github;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $interesting;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->type = (string)$data['type'];
        $this->name = (string)$data['name'];
        $this->nameShort = (string)$data['name_short'];
        $this->detail = (string)$data['detail'];
        $this->detailShort = (string)$data['detail_short'];
        $this->company = (string)$data['company'];
        $this->url = (string)$data['url'];
        $this->dateStart = (string)$data['date_start'];
        $this->dateEnd = (string)$data['date_end'];
        $this->size = (int)$data['size'];
        $this->github = (string)$data['github'];
        $this->interesting = (bool)$data['interesting'];
    }


    /**
     * Get the shortest name of portfolio record.
     * @return string The shortest name
     */
    public function getNameShortest(): string
    {
        return $this->getNameShort() ?? $this->getName();
    }

    /**
     * Age of this portfolio item
     * @throws \Exception
     * @return float Age in days
     */
    public function getAge(): float
    {
        $date = new \DateTime($this->getDateStart());
        $now = new \DateTime();

        return $now->diff($date)->days;
    }

    /**
     * Get CSS classes for this portfolio item.
     * @return string CSS classes
     */
    public function getCssClasses(): string
    {
        // Basic classes
        $class = ['portfolio', make_css_name($this->type)];

        if ($this->isInteresting()) {
            $class[] = 'interesting';
        }

        if ($this->isRunning()) {
            $class[] = 'running';
        }

        return implode(' ', $class);
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
    public function getNameShort(): string
    {
        return $this->nameShort;
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
    public function getDetailShort(): string
    {
        return $this->detailShort;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateStart(): \DateTimeImmutable
    {
        return $this->dateStart;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateEnd(): \DateTimeImmutable
    {
        return $this->dateEnd;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getGithub(): string
    {
        return $this->github;
    }

    /**
     * @return bool
     */
    public function isInteresting(): bool
    {
        return $this->interesting;
    }
}
