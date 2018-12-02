<?php

/**
 * Basic class for website.
 * @class Rychecky
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

use \PDO;

class Rychecky
{
    /**
     * Create database connection.
     * @param string $dsn Data source name (optional with .env fallback)
     * @param string $dbUser Database user name (optional with .env fallback)
     * @param string $dbPassword Database password (optional with .env fallback)
     * @return \PDO PDO connection to database
     */
    public function createDatabaseConnection(string $dsn = '', string $dbUser = '', string $dbPassword = ''): PDO
    {
        // Process credentials with fallback to .env
        $dsn = $dsn ?: 'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_NAME');
        $dbUser = $dbUser ?: env('DB_USER');
        $dbPassword = $dbPassword ?: env('DB_PASSWORD');

        // Create PDO connection
        $db = new PDO($dsn, $dbUser, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES utf8');

        return $db;
    }

    /**
     * Initialize Latte and display view
     * @param string $name Název view
     * @param array  $data Array with data for view
     */
    public function view(string $name, array $data = []): void
    {
        $latte = new \Latte\Engine;
        $latte->setTempDirectory('temp');

        $data['locale'] = Language::getLocale(); // Locale injecting for every view

        // Render view from file
        $filepath = ROOT . '/views/' . $name . '.latte';
        $latte->render($filepath, $data);
    }
}
