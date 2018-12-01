<?php

/**
 * Image (picture) entity for portfolio.
 * @class Image
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Gallery;

use Rychecky\DatabaseRecordTrait;

class Image
{
    use DatabaseRecordTrait;

    /**
     * @var int $portfolioId Binded porfolio ID
     */
    private $portfolioId;

    /**
     * @var string $filename Image filename
     */
    private $filename;

    /**
     * @var string $title Image title
     */
    private $title;

    /**
     * @var bool $thumbnail Is thumbnail?
     */
    private $thumbnail;

    /**
     * @var int $order Order in gallery
     */
    private $order;

    /**
     * Image constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->portfolioId = (int)$data['portfolio_id'];
        $this->filename = (string)$data['filename'];
        $this->title = (string)$data['title'];
        $this->thumbnail = (bool)$data['thumbnail'];
        $this->order = (int)$data['order'];
    }

    /**
     * Generate full URL for image.
     * @return string Image URL
     */
    public function getFullUrl(): string
    {
        if (!empty($this->getFilename())) {
            return URL . '/images/portfolio/' . $this->getPortfolioId() . '/' . $this->getFilename();
        }

        return URL . '/images/placeholder.png';
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
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isThumbnail(): bool
    {
        return $this->thumbnail;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }
}
