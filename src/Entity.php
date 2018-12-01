<?php

/**
 * Basic template for all PHP expressed database entities.
 * @class Repository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

abstract class Entity
{
    /**
     * @var int $rowId Row ID
     */
    private $rowId;

    /**
     * @var bool $visible Visible? (Not deleted)
     */
    private $visible;

    /**
     * @var string $locale Locale of this record (cs/en)
     */
    private $locale;

    /**
     * @var string $added Date and time of creation of this record
     */
    private $added;

    /**
     * @var string $timestamp Date and time of the last update of this record
     */
    private $timestamp;

    /**
     * Entity constructor. All real entity children are intended to call their parent's constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        $this->rowId = (int)$data['row_id'];
        $this->locale = (string)$data['locale'];
        $this->visible = (bool)$data['visible'];
        $this->added = (string)$data['added'];
        $this->timestamp = (string)$data['string'];
    }

    /**
     * @return int
     */
    public function getRowId(): int
    {
        return $this->rowId;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return string
     */
    public function getAdded(): string
    {
        return $this->added;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }
}
