<?php

/**
 * Řadič webu rychecky.cz.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class RycheckyController
 */

class RycheckyController extends Controller
{

    /**
     * Konstruktor řadiče.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     *  Zobrazuje titulní stranu.
     */

    public function index()
    {
        Rychecky::viewLatte('info', [
            'hobby' => HobbyList::all(), // Seznam koníčků
            'social' => SocialList::all() // Seznam tlačítek pro sociální sítě
        ]);
    }


    /**
     *  Zobrazuje dovednosti.
     */

    public function skills()
    {
        Rychecky::viewLatte('skill', [
            'list' => SkillList::findByType(SkillListType::selectedSkillType()),
            'stats' => SkillListType::fetchSkillTypeStats()
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio()
    {
        Rychecky::viewLatte('portfolio', [
            'list' => PortfolioList::all()
        ]);
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences()
    {
        Rychecky::viewLatte('experiences', [
            'list' => ExperienceList::all()
        ]);
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate()
    {
        Rychecky::viewLatte('certificate', [
            'list' => CertificateList::all()
        ]);
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact()
    {
        Rychecky::viewLatte('contact', [
            'social' => SocialList::all()
        ]);
    }
}
