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

function directorsDropDown(array $directors){
    $directorsComponent = '';
    foreach($directors as $director){
        $directorsComponent .=
            '<option value="'. $director['id']. '">' . $director['director'] . '</option>';
    }
    return $directorsComponent;
}

function phasesDropDown(array $phases){
    $phasesComponent = '';
    foreach($phases as $phase){
        $phasesComponent .=
            '<option value="'. $phase['id']. '">' . $phase['phase'] . '</option>';
    }
    return $phasesComponent;
}


