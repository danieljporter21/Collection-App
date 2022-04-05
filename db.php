<?php

/**
 * Get a connection to a MySQL database.
 *
 * utf8mb4 is the recommended character set for modern MySQL databases.
 *
 * The PDO MySQL driver uses emulated prepared statements by default. As MySQL
 * supports prepared statements, emulation is turned off.
 *
 * @param string $db The name of a database.
 * @return PDO A PDO instance representing a connection to the database.
 */
function connectToDB(string $db): PDO
{
    $host = 'db';
    $user = 'root';
    $pass = 'password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $dbConnection = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $exception) {
        throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
    }

    return $dbConnection;
}

/**
 * @param PDO $dbConnection The database connection.
 * @param string $sql An SQL statement.
 * @param array|null $params [Optional] An associative array of parameters to
 *                           be bound to named parameters.
 * @return array Rows from the database.
 */

function fetchAll(PDO $dbConnection, string $sql, array $params = null): array
{
    $query = $dbConnection->prepare($sql);

    $query->execute($params);

    return $query->fetchAll();
}

function fetchAllFilms(PDO $dbConnection): array
{
    $sql = 'SELECT `films`.`id`, `films`.`title`, `films`.`box_office`, `films`.`director`, `films`.`box_office`,
           `films`.`phase`, `films`.`release_date`, `films`.`img_name`, `directors`.`director`, `phases`.`phase`
            FROM `films`
            LEFT JOIN `directors`
                ON `films`.`director` = `directors`.`id`
                LEFT JOIN `phases`
                ON `films`.`phase` = `phases`.`id`;';

    return fetchAll($dbConnection, $sql);
}

function fetchAllDirectors(PDO $dbConnection): array
{
    $sql = 'SELECT `directors`.`id`, `directors`.`director`
            FROM `directors`';

    return fetchAll($dbConnection, $sql);
}
