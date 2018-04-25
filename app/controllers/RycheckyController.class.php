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
        Rychecky::view('skill.master', [
            // Seznam dovedností zvolené skupiny
            'skill_list' => SkillList::findByType(SkillListType::selectedSkillType()),
            // Skupiny a počet dovedností
            'skill_stats' => SkillListType::fetchSkillTypeStats()
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio()
    {
        Rychecky::view('portfolio.master', PortfolioList::all());
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences()
    {
        Rychecky::view('experience.master', ExperienceList::all());
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate()
    {
        Rychecky::view('certificate.master', CertificateList::all());
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact()
    {
        Rychecky::view('contact', SocialList::all());
    }
}
