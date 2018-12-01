<?php

/**
 * Experience (work/education) entity.
 * @class Experience
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Experience;

use Rychecky\Entity;

class Experience extends Entity
{
    /**
     * @var int $experienceId Experience ID
     */
    private $experienceId;

    /**
     * @var string $type Experience type
     */
    private $type;

    /**
     * @var string $title Title of experience
     */
    private $title;

    /**
     * @var string $company Origin company
     */
    private $company;

    /**
     * @var string $dateStart Date of experience start
     */
    private $dateStart;

    /**
     * @var string $date_end Date of experience end
     */
    private $dateEnd;

    /**
     * @var string $detail Detail description
     */
    private $detail;

    /**
     * @var string $note Any note
     */
    private $note;

    /**
     * Experience constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->experienceId = (int)$data['experience_id'];
        $this->type = (string)$data['type'];
        $this->title = (string)$data['title'];
        $this->company = (string)$data['company'];
        $this->dateStart = (string)$data['date_start'];
        $this->dateEnd = (string)$data['date_end'];
        $this->detail = (string)$data['detail'];
        $this->note = (string)$data['note'];
    }

    /**
     * Is experience currently ongoing?
     * @return bool
     */
    public function isCurrent(): bool
    {
        return !empty($this->getDateEnd());
    }

    /**
     * @return int
     */
    public function getExperienceId(): int
    {
        return $this->experienceId;
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
