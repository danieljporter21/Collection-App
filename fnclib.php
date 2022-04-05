<?php

function displayFilms(array $films): string
{
    $filmcomponent = '';
    foreach ($films as $film) {
        $filmcomponent .=
            '<div class="film">'
            . '<h2>' . $film['title'] . '</h2>'
            . '<img src="Images/' . $film['img_name'] . '">'
            . '<p> Box Office: $' . $film['box_office'] . 'm</p>'
            . '<p> Director: ' . $film['director'] . '</p>'
            . '<p> Phase: ' . $film['phase'] . '</p>'
            . '<p> Release Date: ' . date('d-m-y',strtotime($film['release_date'])). '</p>'
            . '</div>';
    }
    return $filmcomponent;
}

function dropDownDirectors(array $directors): string
{
    $directorComponent = '';
    foreach ($directors as $director) {
        $directorComponent .=
            '<option value=' . $director['id'] . '>' . $director['director'] . '</option>';
    }
    return $directorComponent;
}


