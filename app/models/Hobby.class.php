<?php

/**
 * Koníček (zájem) na webu.
 * @class Hobby
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Hobby
{

    use DatabaseRecordTrait, LocalizedTrait;

    /**
     * @var integer $hobby_id ID koníčku
     */
    public $hobby_id;

    /**
     * @var string $name Název koníčku
     */
    public $name;

    /**
     * @var float $size Velikost textu tohoto koníčku
     */
    public $size;


    /**
     * Generuje náhodný CSS tohoto koníčku dle jeho velikosti.
     * @return array Náhodné CSS v poli
     */

    public function randomHobbyCss(): array
    {
        $css = []; // Iniciace CSS

        $css['font-size'] = $this->size * 0.02 . 'em'; // Velikost
        $css['margin-left'] = rand(0, 10) . 'px'; // Odsazení zleva
        $css['margin-right'] = rand(0, 10) . 'px'; // Odsazení zprava
        $css['margin-top'] = rand(0, 5) . 'px'; // Odsazení zeshora
        $css['float'] = rand(0, 1) ? 'left' : 'right'; // 1:1 zarovnání doleva/doprava...

        return $css;
    }
}
