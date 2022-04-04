<?php
require_once 'misclib.php';
require_once 'style.css';

$days = ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];


$host = 'db';
$db = 'tennis';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $exception){
    throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
}

$query = $pdo->prepare('SELECT `last_name`, `id`,`rain`, `dry`, `snow`, `sunny`, `lawn`, `clay`, `hard`
                               FROM `player_data`;');

$query->execute();

$result = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML with PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="days"><?php echo getday($days) ?></div>

<div class="days">
    <?php
    echo '<div class="days">';
    foreach ($result as $person){
            echo '<p>' . $person['last_name'] ." " .  $person['rain'] .  '</p>';
    }
    echo '</div>';
    ;?>
</div>

</body>
</html>