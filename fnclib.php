<?php

function displayFilms(array $films): string
{
    echo '<pre>';
    print_r($films);
    echo '</pre>';
    $filmcomponent = '';
    foreach ($films as $film) {
        $filmcomponent .=
            '<div class="film">'
            . '<h2>' . $film['title'] . '</h2>'
            . '<img src="Images/' . $film['img_name'] . '">'
            . '<p> Box Office: $' . $film['box_office'].'m</p>'
            . '<p> Director: ' . $film['director'].'</p>'
            . '<p> Phase: ' . $film['phase'].'</p>'
            . '<p> Release Date: ' . $film['release_date'].'</p>'
            . '</div>';
    }
    return $filmcomponent;
}
