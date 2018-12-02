<?php
/**
 * Menu menu item class.
 * @class Item
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Menu;

use Rychecky\Language;

class Item
{
    /**
     * @var string $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $icon
     */
    private $icon;

    /**
     * MenuItem constructor.
     * @param array $data Data for building menu item
     */
    public function __construct($data = [])
    {
        $this->id = (string)$data[0];
        $this->name = (string)$data[1];
        $this->icon = (string)$data[3];

        // TODO: Refactor locales
        if ('en' === Language::getLocale()) {
            $this->name = (string)$data[2];
        }
    }

    /**
     * Is this menu item selected?
     * @return bool Is selected?
     */
    public function isSelected(): bool
    {
        // Selected homepage
        if ('/' === $_SERVER['REQUEST_URI'] && empty($this->getId())) {
            return true;
        }

        // Selected any other page by its ID in URL
        return false !== strpos($_SERVER['REQUEST_URI'], $this->getId());
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return URL . '/' . $this->getId();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getIcon(): string
    {
        return $this->icon;
    }
}
