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

    public function index(): void
    {
        Rychecky::view('info', [
            'hobby' => HobbyList::all($this->db), // Seznam koníčků
            'social' => SocialList::all($this->db) // Seznam tlačítek pro sociální sítě
        ]);
    }


    /**
     *  Zobrazuje dovednosti.
     */

    public function skills(): void
    {
        Rychecky::view('skill', [
            'list' => SkillList::findByType($this->db, SkillListType::selectedSkillType()),
            'stats' => SkillListType::fetchSkillTypeStats($this->db)
        ]);
    }


    /**
     *  Zobrazuje portfolio.
     */

    public function portfolio(): void
    {
        Rychecky::view('portfolio', [
            'list' => PortfolioList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje zkušenosti.
     */
    public function experiences(): void
    {
        Rychecky::view('experiences', [
            'list' => ExperienceList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje výčet certifikátů.
     */
    public function certificate(): void
    {
        Rychecky::view('certificate', [
            'list' => CertificateList::all($this->db)
        ]);
    }


    /**
     *  Zobrazuje kontaktní stránku.
     */
    public function contact(): void
    {
        Rychecky::view('contact', [
            'social' => SocialList::all($this->db)
        ]);
    }
}
