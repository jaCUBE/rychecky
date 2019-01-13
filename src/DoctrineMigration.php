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

    /**
     *
     */
    public function truncate(): void
    {
        $sql = '
        USE rychecky_doctrine;
        TRUNCATE hobbies;
        TRUNCATE portfolio;
        TRUNCATE social_links;
        TRUNCATE skills;
        USE rychecky';

        $this->getDb()->query($sql);
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
            $hobby = new Entity\Hobby([
                'name' => $row['name'],
                'size' => (int)$row['size'],
                'locale' => $row['locale'],
                'createdAt' => $row['added'],
            ]);

            $this->getEm()->persist($hobby);
        }

        $this->getEm()->flush();
    }

    public function migrateSocial(): void
    {
        $sql = '
          SELECT s.*
          FROM social AS s
          WHERE s.visible = 1
          ORDER BY s.order DESC, s.name ASC;';

        $STH = $this->getDb()->query($sql);

        while ($row = $STH->fetch()) {
            $social = new Entity\Social([
                'name' => $row['name'],
                'url' => $row['url'],
                'icon' => $row['icon'],
                'order' => $row['order'],
                'color' => $row['color'],
                'createdAt' => $row['added'],
            ]);

            $this->getEm()->persist($social);
        }

        $this->getEm()->flush();
    }

    public function migrateSkill(): void
    {
        $sql = '
          SELECT s.*
          FROM skill AS s
          WHERE s.visible = 1
          ORDER BY s.value DESC';

        $STH = $this->getDb()->query($sql);

        while ($row = $STH->fetch()) {
            $skill = new Entity\Skill([
                'type' => $row['type'],
                'name' => $row['name'],
                'value' => $row['value'],
                'detail' => $row['detail'],
                'locale' => $row['locale'],
                'createdAt' => $row['added'],
            ]);

            $this->getEm()->persist($skill);
        }

        $this->getEm()->flush();
    }

    public function migrateCertificate(): void
    {
        $sql = '
          SELECT c.*
          FROM certificate AS c
          WHERE c.visible = 1';

        $STH = $this->getDb()->query($sql);

        while ($row = $STH->fetch()) {
            $certificate = new Entity\Certificate([
                'type' => $row['type'],
                'name' => $row['name'],
                'detail' => $row['detail'],
                'issueDate' => $row['issue_date'],
                'issueBy' => $row['issue_by'],
                'locale' => $row['locale'],
                'createdAt' => $row['added'],
            ]);

            d($certificate);

            $this->getEm()->persist($certificate);
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
