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
        Rychecky::view('index', [
            'hobby' => HobbyList::fetchHobbyList(), // Seznam koníčků
            'social' => SocialList::fetchSocialList() // Seznam tlačítek pro sociální sítě
        ]);
    }


    /**
     *  Zobrazuje dovednosti.
     */

    public function skills()
    {
        Rychecky::view('skill.master', [
            // Seznam dovedností zvolené skupiny
            'skill_list' => SkillList::fetchSkillListByType(SkillListType::selectedSkillType()),
            // Skupiny a počet dovedností
            'skill_stats' => SkillListType::fetchSkillTypeStats()
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio()
    {
        Rychecky::view('portfolio.master', PortfolioList::fetchPortfolioList());
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences()
    {
        Rychecky::view('experience.master', ExperienceList::fetchExperienceList());
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate()
    {
        Rychecky::view('certificate.master', CertificateList::fetchCertificateList());
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact()
    {
        Rychecky::view('contact', SocialList::fetchSocialList());
    }
}
