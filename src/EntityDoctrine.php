<?php

/**
 * Basic entity prototype for Doctrine ORM.
 * @class Repository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

use Doctrine\ORM\Mapping as ORM;

abstract class EntityDoctrine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=2, options={"default" : "cs"})
     */
    protected $locale;

    /**
     * @ORM\Column(name="created_at", type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    protected $createdAt;

    /**
     * EntityDoctrine constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct($data = [])
    {
        d($data);
        $this->locale = $data['locale'] ?? 'cs'; // TODO: Default language by constant
        $this->createdAt = new \DateTimeImmutable($data['createdAt']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
