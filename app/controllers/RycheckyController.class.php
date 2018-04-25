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
        Rychecky::view('info', [
            'hobby' => HobbyList::all(), // Seznam koníčků
            'social' => SocialList::all() // Seznam tlačítek pro sociální sítě
        ]);
    }


    /**
     *  Zobrazuje dovednosti.
     */

    public function skills()
    {
        Rychecky::view('skill', [
            'list' => SkillList::findByType(SkillListType::selectedSkillType()),
            'stats' => SkillListType::fetchSkillTypeStats()
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio()
    {
        Rychecky::view('portfolio', [
            'list' => PortfolioList::all()
        ]);
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences()
    {
        Rychecky::view('experiences', [
            'list' => ExperienceList::all()
        ]);
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate()
    {
        Rychecky::view('certificate', [
            'list' => CertificateList::all()
        ]);
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact()
    {
        Rychecky::view('contact', [
            'social' => SocialList::all()
        ]);
    }
}
