<?php

/**
 * Řadič webu rychecky.cz.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class RycheckyController
 */

class RycheckyController extends Controller
{

    /**
     *  Zobrazuje titulní stranu.
     */

    public function index()
    {
        Rychecky::view('info', [
            'hobby' => HobbyList::all($this->db), // Seznam koníčků
            'social' => SocialList::all($this->db) // Seznam tlačítek pro sociální sítě
        ]);
    }


    /**
     *  Zobrazuje dovednosti.
     */

    public function skills()
    {
        Rychecky::view('skill', [
            'list' => SkillList::findByType($this->db, SkillListType::selectedSkillType()),
            'stats' => SkillListType::fetchSkillTypeStats($this->db)
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio()
    {
        Rychecky::view('portfolio', [
            'list' => PortfolioList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences()
    {
        Rychecky::view('experiences', [
            'list' => ExperienceList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate()
    {
        Rychecky::view('certificate', [
            'list' => CertificateList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact()
    {
        Rychecky::view('contact', [
            'social' => SocialList::all($this->db)
        ]);
    }
}
