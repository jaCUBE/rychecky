<?php

/**
 * Social website URL and icon entity.
 * @class Social
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Social;

use Rychecky\Entity;

class Social extends Entity
{
    /**
     * @var int $socialId Social network link ID
     */
    public $socialId;

    /**
     * @var string $name Social network name
     */
    public $name;

    /**
     * @var string $url Social network profile URL
     */
    public $url;

    /**
     * @var string $icon Social network Font Awesome icon
     */
    public $icon;

    /**
     * @var string $color Color HEX
     */
    public $color;


    /**
     * Social constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->socialId = (int)$data['social_id'];
        $this->name = (string)$data['name'];
        $this->url = (string)$data['url'];
        $this->icon = (string)$data['icon'];
        $this->color = (string)$data['color'];
    }

    /**
     * @return int
     */
    public function getSocialId(): int
    {
        return $this->socialId;
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
}
