<?php

/**
 * Hobby entity for a website.
 * @class Hobby
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Hobby;

use Rychecky\DatabaseRecordTrait;
use Rychecky\LocalizedTrait;
use Rychecky\Collection;

class Hobby
{
    use DatabaseRecordTrait, LocalizedTrait;

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
     * @param array $hobbyData
     */
    public function __construct(array $hobbyData)
    {
        $this->hobbyId = (int)$hobbyData['hobby_id'];
        $this->name = $hobbyData['name'];
        $this->size = (int)$hobbyData['size'];
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
