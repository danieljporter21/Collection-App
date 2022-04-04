<?php

function displayFilm($array)
{
    foreach ($array as $film) {
        $filmcomponent =
            '<div class="film">'
            . '<h2>' . $film['title'] . '</h2>'
            . '<img src="Images/' . $film['img_name'] . '">'
            . '<p> Box Office: $' . $film['box_office'].'m</p>'
            . '<p> Director: ' . $film['director'].'</p>'
            . '<p> Phase: ' . $film['phase'].'</p>'
            . '<p> Release Date: ' . $film['release_date'].'</p>'
            . '</div>';
        echo $filmcomponent;
    }
}
