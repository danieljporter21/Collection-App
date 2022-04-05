<?php
require_once 'db.php';
require_once 'fnclib.php';

$films = fetchAllFilms(connectToDB('CollectionApp'));

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML with PHP</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<header>
<!--    <div class="header"></div>-->
    <h1>Marvel Film Collection</h1>
</header>
<main>
    <div class="box">
        <?php
        '<div>' . displayFilm($films) . '</div>';
        ?>
    </div>
</main>

<footer>
    <button>Add Film To Collection</button>

</footer>

</body>
</html>
