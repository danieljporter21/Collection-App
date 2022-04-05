<?php

require_once '../fnclib.php';

use PHPUnit\Framework\TestCase;

class fnclib extends TestCase
{
    public function testGivenEmptyArray()
    {
        $array = [];

        $result = displayFilms($array);

        $this->assertEquals('', $result);

    }

    public function testGivenValidFilm()
    {
        $array[] = array(
            'id' => 1,
            'title' => 'Iron-Man',
            'box_office' => 585.2,
            'director' => 'John Favreau',
            'phase' => 'One',
            'release_date' => '2008-05-02',
            'img_name' => 'iron_man1.jpg'
        );

        $result = displayFilms($array);

        $this->assertEquals('<div class="film"><h2>Iron-Man</h2><img src="Images/iron_man1.jpg"><p> Box Office: $585.2m</p><p> Director: John Favreau</p><p> Phase: One</p><p> Release Date: 2008-05-02</p></div>', $result);
    }


    public function testGivenStringThrowError()
    {
        //Arrange - setting up the data
        $array = 'string';

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = displayFilms($array);

    }
}