<?php

function displayFilms(array $films): string
{
    $filmcomponent = '';
    foreach ($films as $film) {
        $date = date('d-m-y', strtotime($film['release_date']));
        $filmcomponent .=
            '<div class="film hover">'
            . '<h2>' . $film['title'] . '</h2>'
            . '<img src="Images/' . $film['img_name'] . '">'
            . '<p> Box Office: $' . $film['box_office'] . 'm</p>'
            . '<p> Director: ' . $film['director'] . '</p>'
            . '<p> Phase: ' . $film['phase'] . '</p>'
            . '<p> Release Date: ' . $date . '</p>'
            . '</div>';
    }
    return $filmcomponent;
}

function directorsDropDown(array $directors): string
{
    $directorsComponent = '';
    foreach ($directors as $director) {
        $directorsComponent .=
            '<option value="' . $director['id'] . '">' . $director['director'] . '</option>';
    }
    return $directorsComponent;
}

function phasesDropDown(array $phases): string
{
    $phasesComponent = '';
    foreach ($phases as $phase) {
        $phasesComponent .=
            '<option value="' . $phase['id'] . '">' . $phase['phase'] . '</option>';
    }
    return $phasesComponent;
}

function formatDate(string $inputDate): string
{
    $formatedDate = date('Y-m-d', strtotime($inputDate));
    return $formatedDate;
}

function validateFormData(array $formData): bool
{
    if (count($formData) == 0) {
        return [];
    }
    $isValid = true;
    $date = $formData['releaseDate'];
    $boxoffice = $formData['boxOffice'];
    if (false === strtotime($date)) {
        $isValid = false;
    } elseif ($date <= date('Y-m-d', strtotime("01/01/1990"))) {
        $isValid = false;
    } elseif (is_numeric($boxoffice) == false) {
        $isValid = false;
    }
    return $isValid;
}

function sanitiseFormData(array $formData): array
{
    if (count($formData) == 0) {
        return [];
    }
    $date = $formData['releaseDate'];
    if ($date === '') {
        $date = null;
    }
    $title = $formData['title'];
    if ($title === '') {
        $title = null;
    }
    $boxoffice = $formData['boxOffice'];
    if ($boxoffice === '') {
        $boxoffice = null;
    }
    $cleanFormData = [
        'title' => $title,
        'boxOffice' => $boxoffice,
        'director' => $formData['director'],
        'releaseDate' => $date,
        'phase' => $formData['phase'],
    ];
    return $cleanFormData;
}
