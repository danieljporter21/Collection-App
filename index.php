<?php
require_once 'db.php';
require_once 'fnclib.php';

$db = 'CollectionApp';
$films = fetchAllFilms(connectToDB($db));

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HTML with PHP</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Marvel Film Collection</title>
</head>

<body>
<header>
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
    <button>Add Film To Collection</button>
</footer>

</body>
</html>
