<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;
use Rychecky\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="hobbies", indexes={
 *     @ORM\Index(name="hobbies_idx_locale", columns={"locale"}),
 *     @ORM\Index(name="hobbies_idx_size", columns={"size"}),
 * })
 */
class Hobby extends EntityDoctrine
{
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $size;

    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->name = (string)$data['name'];
        $this->size = (int)$data['size'];
        $this->locale = (string)$data['locale'];
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
        $cssCollection->set('font-size', $this->getSize() * 0.02 . 'em');
        $cssCollection->set('margin-left', random_int(0, 10) . 'px');
        $cssCollection->set('margin-top', random_int(0, 5) . 'px');
        $cssCollection->set('margin-right', random_int(0, 10) . 'px');

        return $cssCollection;
    }

    /**
     * Generate CSS for hobby as in-line style.
     * @param Collection|null $cssCollection Collection of CSS properties and values (optional)
     * @throws \Exception
     * @return string In-line CSS for this hobby
     */
    public function randomHobbyCssAsInlineString(?Collection $cssCollection = null): string
    {
        $cssInline = [];
        $cssCollection = $cssCollection ?? $this->randomHobbyCss();

        foreach ($cssCollection as $property => $value) {
            $cssInline[] = $property . ': ' . $value . ';';
        }

        return implode('; ', $cssInline);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
