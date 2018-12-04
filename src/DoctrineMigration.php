<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 04.12.2018
 * Time: 23:17
 */

namespace Rychecky;

class DoctrineMigration
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct(\PDO $db, \Doctrine\ORM\EntityManager $em)
    {
        $this->db = $db;
        $this->em = $em;
    }


    public function migrateHobby(): void
    {
        $sql = '
            SELECT h.*
            FROM hobby AS h
            WHERE h.visible = 1
            ORDER BY RAND()';

        $STH = $this->getDb()->query($sql);

        while ($row = $STH->fetch()) {
            $hobby = new Hobby\Hobby([
                'name' => $row['name'],
                'size' => (int)$row['size'],
                'locale' => $row['locale'],
                'createdAt' => new \Datetime($row['added']),
            ]);

            $this->getEm()->persist($hobby);
        }

        $this->getEm()->flush();
    }

    /**
     * @return \PDO
     */
    public function getDb(): \PDO
    {
        return $this->db;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEm(): \Doctrine\ORM\EntityManager
    {
        return $this->em;
    }


}
