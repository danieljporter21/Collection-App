<?php
require_once 'db.php';
require_once 'fnclib.php';

$db = 'CollectionApp';
$films = fetchAllFilms(connectToDB($db));
$directors = fetchAllDirectors(connectToDB($db));
$phases = fetchAllPhases(connectToDB($db));

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Marvel Film Collection</title>
</head>

<body>
<header>
    <div class="bar"></div>
    <h1>Marvel Film Collection</h1>
</header>
<main>
    <div class="box">
        <?php
        echo displayFilms($films);
        ?>
    </div>
</main>
<footer>
    <button onclick="window.location.href='userform.php';">Add to Collection</button>
</footer>
</body>
</html>
