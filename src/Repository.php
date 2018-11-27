<?php

/**
 * Basic template for all repository classes.
 * @class Repository
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

use \PDO;

abstract class Repository
{
    /**
     * @var PDO Database connection
     */
    private $db;

    /**
     * Repository constructor.
     * @param PDO $db Database connection
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get database connection.
     * @return PDO Database connection
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}
