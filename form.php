<?php

require_once 'db.php';

$db = 'CollectionApp';
$connection = (connectToDB($db));

function addToDB($pdo) {

    $query = $pdo->prepare(
        'INSERT INTO `films` (`title`,`box_office`, `director`, `phase`, `release_date`)'
        . 'VALUES (:newTitle, :newBoxOffice, :newDirector, :newPhase, :newReleaseDate)'
    );


    $title = $_POST['title'];
////    $boxOffice = $_POST['box_office'];
//////    $director = intval($_POST['director']);
//////    $phase = $_POST['phase'];
////    $releaseDate= $_POST['release_date'];
//
    $query->bindParam(':newTitle', $title);
////    $query->bindParam(':newBoxOffice', $boxOffice);
//////    $query->bindParam(':newDirector', $director);
//////    $query->bindParam(':newPhase', $phase);
////    $query->bindParam(':newReleaseDate', $releaseDate);

    $query->execute();

}

addToDB($connection);

header("Location: index.php");

