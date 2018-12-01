<?php

/**
 * Portfolio (website/project) entity.
 * @class Portfolio
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Portfolio;

use Rychecky\Entity;

class Portfolio extends Entity
{
    /**
     * @var int $portfolioId Portfolio ID
     */
    private $portfolioId;

    /**
     * @var string $type Portfolio type
     */
    private $type;

    /**
     * @var string $name Portfolio name
     */
    private $name;

    /**
     * @var string $nameShort Short portfolio name
     */
    private $nameShort;

    /**
     * @var string $detail Portoflio description
     */
    private $detail;

    /**
     * @var string $detailShort Short portfolio description
     */
    private $detailShort;

    /**
     * @var string $company Company of origin
     */
    private $company;

    /**
     * @var string $url Portfolio URL
     */
    private $url;

    /**
     * @var string $dateStart Cooperation/development start date
     */
    private $dateStart;

    /**
     * @var string $dateEnd Cooperation/development end date
     */
    private $dateEnd;

    /**
     * @var int $size Portfolio project size
     */
    private $size;

    /**
     * @var string $github GitHub repository URL
     */
    private $github;

    /**
     * @var bool $interesting Is interesting?
     */
    private $interesting;

    /**
     * Portfolio constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->portfolioId = (int)$data['portfolio_id'];
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
     * Is this portfolio item still running in development?
     * @return bool Is under development?
     */
    public function isRunning(): bool
    {
        $started = !empty($this->getDateStart()) && strtotime($this->getDateStart()) <= strtotime('today');
        $ended = !empty($this->getDateEnd()) && strtotime($this->getDateEnd()) <= strtotime('today');

        return $started && !$ended; // Started but not ended yet
    }

    /**
     * @return int
     */
    public function getPortfolioId(): int
    {
        return $this->portfolioId;
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
     * @return string
     */
    public function getDateStart(): string
    {
        return $this->dateStart;
    }

    /**
     * @return string
     */
    public function getDateEnd(): string
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
