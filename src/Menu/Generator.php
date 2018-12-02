<?php
/**
 * Prepares whole menu.
 * @class Item
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky\Menu;

use Rychecky\Collection;

class Generator
{
    /**
     * Menu structure
     * [id, czech name, english name, icon]
     */
    private const MENU = [
        ['', 'Informace', 'Info', 'fa-home'],
        ['skills', 'Dovednosti', 'Skills', 'fa-database'],
        ['portfolio', 'Portfolio', 'Portfolio', 'fa-bookmark'],
        ['experiences', 'Zkušenosti', 'Experiences', 'fa-briefcase'],
        ['certificate', 'Certifikace', 'Certificates', 'fa-certificate'],
        ['contact', 'Kontakt', 'Contact', 'fa-envelope'],
    ];


    /**
     * Build whole menu in MenuItem objects passed by Collection.
     * @return Collection A collection of MenuItem objects.
     */
    public function buildMenu(): Collection
    {
        $menuColllection = new Collection();

        foreach (self::MENU as $menuData) {
            $menuColllection->add(new Item($menuData));
        }

        return $menuColllection;
    }
}
