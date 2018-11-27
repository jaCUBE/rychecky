<?php

/**
 * Poskytuje potřebné metody pro vygenerování hlavní navigace.
 * @class Menu
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

class Menu
{

    /**
     * Generuje celé menu jako PHP pole.
     * @return string[] Menu jako pole
     */

    public static function generateMenu(): array
    {
        // @TODO: Odstranit hardcoded menu?
        $menu = [
            '' => [
                'name' => e('Informace', 'Info'),
                'icon' => 'fa-home'
            ],
            'skills' => [
                'name' => e('Dovednosti', 'Skills'),
                'icon' => 'fa-database'
            ],
            'portfolio' => [
                'name' => e('Portfolio', 'Portfolio'),
                'icon' => 'fa-bookmark'
            ],
            'experiences' => [
                'name' => e('Zkušenosti', 'Experiences'),
                'icon' => 'fa-briefcase'
            ],
            'certificate' => [
                'name' => e('Certifikace', 'Certificates'),
                'icon' => 'fa-certificate'
            ],
            'contact' => [
                'name' => e('Kontakt', 'Contact'),
                'icon' => 'fa-envelope'
            ],
        ];

        return $menu;
    }


    /**
     * Je zvolená URL právě vybraná?
     * @param string $url Kontrolovaná URL
     * @return bool Je URL zvoleno?
     */

    public static function isMenuSelected(string $url): bool
    {
        // Zvolená titulní strana (index)
        $index = (Rychecky::action() === 'index' AND empty($url));

        // Zvolená položka menu
        $selected = Rychecky::action() === $url;

        return $index OR $selected;
    }
}
