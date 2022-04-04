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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/normalize.css">
</head>
<body>
<header>
    <div class="header">
        <p>Marvel Film Collection</p>
    </div>
</header>

<div class="box">
    <?php
    '<div class="box">' . displayFilm($films) . '</div>';
    ?>
</div>

</body>
</html>

