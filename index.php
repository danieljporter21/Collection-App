<?php
require_once 'db.php';
require_once 'fnclib.php';

$films = fetchAllFilms(connectToDB('CollectionApp'));

echo displayFilm($films);



