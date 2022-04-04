<?php

foreach ($result as $film) {
    $filmcomponent =
        '<div>'
        . '<h2>' . $film['title'] . '</h2>'
        . '<img src="Images/' . $film['img_name'] . '">'
        . '</div>';
    echo $filmcomponent;
}
