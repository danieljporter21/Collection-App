<?php

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

function fetchAll(PDO $dbConnection, string $sql, array $params = null): array
{
    $query = $dbConnection->prepare($sql);

    $query->execute($params);

    return $query->fetchAll();
}

function runSQL(PDO $dbConnection, string $sql, array $params = null): void
{
    $query = $dbConnection->prepare($sql);

    $query->execute($params);
}

function fetchAllFilms(PDO $dbConnection): array
{
    $sql = 'SELECT `films`.`id`, `films`.`title`, `films`.`box_office`, `films`.`director`, `films`.`box_office`, `films`.`phase`, `films`.`release_date`,
                                `films`.`img_name`, `directors`.`director`, `phases`.`phase`
                               FROM `films`
                                    INNER JOIN `directors`
                                    ON `films`.`director` = `directors`.`id`
                                    INNER JOIN `phases`
                                    ON `films`.`phase` = `phases`.`id`;';

    return fetchAll($dbConnection, $sql);
}

?>

