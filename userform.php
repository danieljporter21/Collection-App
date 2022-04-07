<?php
require_once 'db.php';
require_once 'fnclib.php';

$db = 'CollectionApp';
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
    <h2 class="formTitle">Fill Out The Form Below To Add To The Collection</h2>
    <form action="form.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="image">Image:</label>
        <input type="file" name="newFile" id="image" >
        <br>
        <label for="boxOffice">Box Office $m:</label>
        <input type="text" id="boxOffice" name="boxOffice" required><br>
        <label for="director">Director:</label>
        <select name="director" id="director">
            <?php
            echo directorsDropDown($directors);
            ?>
        </select>
        <br>
        <label for="phase">Phase:</label>
        <select name="phase" id="phase">
            <?php
            echo phasesDropDown($phases);
            ?>
        </select>
        <br>
        <label for="releaseDate">Release Date:</label>
        <input type="date" id="releaseDate" name="releaseDate" required><br>
        <input class="submit" type="submit">
        <button onclick="window.location.href='index.php';">Back to Collection</button>
    </form>
</main>
</body>
</html>
