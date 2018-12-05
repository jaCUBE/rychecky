<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="social_links", indexes={
 *     @ORM\Index(name="social_links_idx_size", columns={"size"}),
 * })
 */
class Social extends EntityDoctrine
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $url;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $icon;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $color;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $size;

    /**
     * Social constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->name = (string)$data['name'];
        $this->url = (string)$data['url'];
        $this->icon = (string)$data['icon'];
        $this->color = (string)$data['color'];
        $this->size = (int)$data['order'];
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

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
