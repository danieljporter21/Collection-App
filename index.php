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
<<<<<<< HEAD
    <form action="form.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"><br>
        <label for="image">Image:</label>
        <input type="text" id="image" name="image"><br>
        <label for="box_office">Box Office $m:</label>
        <input type="text" id="box_office" name="box_office"><br>
        <label for="director">Director:</label>
<!--        <select name="director" id="director">-->
<!--            --><?php
//                echo dropDownDirectors($directors);
//            ?>
<!--        </select><br>-->
        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date"><br>
        <input type="submit">
    </form>
=======
    <button onclick="window.location.href='userform.php';">Add to Collection</button>
>>>>>>> 4143caaa77c4d022dac5a4d385aab387a2a6d4f6
</footer>
</body>
</html>
