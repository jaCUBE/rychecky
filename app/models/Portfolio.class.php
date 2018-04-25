<?php

/**
 * Položka portfolia na webu.
 * @class Portfolio
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Portfolio
{

    use DatabaseRecordTrait, LocalizedTrait;

    /**
     * @var integer $portfolio_id ID portfolia
     */
    public $portfolio_id;

    /**
     * @var string $type Typ portfolia
     */
    public $type;

    /**
     * @var string $name Název portfolia
     */
    public $name;

    /**
     * @var string $name_short Název portfolia (zkrácený)
     */
    public $name_short;

    /**
     * @var string $detail Detailní popis portfolia
     */
    public $detail;

    /**
     * @var string $detail_short Zkrácený textový popis
     */
    public $detail_short;

    /**
     * @var string $company Název společnosti
     */
    public $company;

    /**
     * @var string $url URL portfolia
     */
    public $url;

    /**
     * @var string $date_start Datum začátku vývoje položky
     */
    public $date_start;

    /**
     * @var string $date_end Datum konce vývoje položky
     */
    public $date_end;


    /**
     * @var integer $size Velikost projektu portfolia
     */
    public $size;

    /**
     * @var string $github URL repozitáře GitHub
     */
    public $github;

    /**
     * @var boolean $interesting Je tato položka portfolia zajímavá?
     */
    public $interesting;


    /**
     * Stahuje portofolio do této instance třídy.
     * @param integer $portfolio_id ID portfolia
     * @return Portfolio Stažené portfolio
     */

    static function findById(int $portfolio_id): Portfolio
    {
        $sql = '
      SELECT p.*
      FROM portfolio AS p
      WHERE p.portfolio_id = :portfolio_id
        AND p.locale = :locale
        AND p.visible = 1
      LIMIT 1'; // SQL pro stažení jednoho portfolia dle ID

        $STH = db()->prepare($sql);
        $STH->bindParam(':portfolio_id', $portfolio_id);
        $STH->bindParam(':locale', Language::getLocale());
        $STH->setFetchMode(PDO::FETCH_CLASS, 'Portfolio');
        $STH->execute();

        $portfolio = $STH->fetch();

        return $portfolio ? $portfolio : new Portfolio();
    }

    /**
     * Co nejkratší název položky portfolia.
     * @return string Nejkratší název
     */

    public function nameShortest(): string
    {
        // PHP 7: Null Coalescence https://wiki.php.net/rfc/isset_ternary
        return $this->name_short ?? $this->name; // Pokud existuje zkrácený, použije se ten
    }

    /**
     * Stáří této položky portfolia.
     * @return float Stáří ve dnech
     */

    public function age(): float
    {
        $difference = time() - strtotime($this->date_start); // Počet sekund od začátku vývoje
        return round($difference / (24 * 60 * 60)); // Převod na dny
    }

    /**
     * Vrací CSS třídy toho portfolia.
     * @return string CSS třídy
     */

    public function css(): string
    {
        // Základní třídy
        $class = ['portfolio', make_css_name($this->type)];

        if ($this->isInteresting()) { // Zajímavé porfoliu?
            $class[] = 'interesting';
        }

        if ($this->isRunning()) { // Portfolium ve vývoji?
            $class[] = 'running';
        }

        return implode(' ', $class);
    }

    /**
     * Jedná se o zajímavou položku portfolia?
     * @return bool Zajímavá položka?
     */

    public function isInteresting(): bool
    {
        return (boolean)$this->interesting;
    }

    /**
     * Je tato položka portfolia právě ve vývoji?
     * @return bool Je ve vývoji?
     */

    public function isRunning(): bool
    {
        $started = !empty($this->date_start) and strtotime($this->date_start) <= strtotime('today'); // Začato: datum začátku existuje a proběhlo
        $ended = !empty($this->date_end) and strtotime($this->date_end) <= strtotime('today'); // Ukončeno: datum konce existuje a proběhlo

        return $started and !$ended; // Začalo a neskončilo
    }

}