<?php

/**
 * Hobby entity for a website.
 * @class Hobby
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Hobby;

use Rychecky\Entity;
use Rychecky\Collection;

class Hobby extends Entity
{
    /**
     * @var int $hobby_id Hobby ID
     */
    private $hobbyId;

    /**
     * @var string $name Hobby name
     */
    private $name;

    /**
     * @var float $size Size of text
     */
    private $size;

    /**
     * Hobby constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->hobbyId = (int)$data['hobby_id'];
        $this->name = $data['name'];
        $this->size = (int)$data['size'];
    }

    /**
     * Generate random CSS for this hobby.
     * @return Collection Random CSS style
     * @throws \Exception
     */
    public function randomHobbyCss(): Collection
    {
        $cssCollection = new Collection();

        $cssCollection->set('float', random_int(0, 1) ? 'left' : 'right');
        $cssCollection->set('font-size', $this->size * 0.02 . 'em');
        $cssCollection->set('margin-left', random_int(0, 10) . 'px');
        $cssCollection->set('margin-top', random_int(0, 5) . 'px');
        $cssCollection->set('margin-right', random_int(0, 10) . 'px');

        return $cssCollection;
    }

    /**
     * @return int
     */
    public function getHobbyId(): int
    {
        return $this->hobbyId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }
}
