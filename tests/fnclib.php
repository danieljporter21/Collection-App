<?php

require_once '../fnclib.php';

use PHPUnit\Framework\TestCase;

class fnclib extends TestCase
{
    public function testMainCollectionGivenEmptyArray()
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

        $this->assertEquals('<div class="film"><h2>Iron-Man</h2><img src="Images/iron_man1.jpg"><p> Box Office: $585.2m</p><p> Director: John Favreau</p><p> Phase: One</p><p> Release Date: 02-05-08</p></div>', $result);
    }

    public function testGivenStringThrowError()
    {
        //Arrange - setting up the data
        $array = 'string';

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = displayFilms($array);
    }

    public function testGivenDateReturnDate()
    {
        $date = '21-07-1994';

        $result = formatDate($date);

        $this->assertEquals('1994-07-21', $result);
    }

    public function testGivenNonDateReturnError()
    {
        $date = [];

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = formatDate($date);
    }

    public function testValidationGivenArrayReturnTrue()
    {

        $array[] = array(
            'title' => 'test',
            'boxOffice' => '123',
            'director' => '1',
            'phase' => '1',
            'releaseDate' => '2022-04-05'
        );

        $result = validateFormData($array);

        $expected = true;

        $this->assertEquals($expected,$result);
    }

//    public function testSanitisationGivenArrayReturnTrue()
//    {
//        $array[] = array(
//            'title' => 'test',
//            'img_name' => '2272e4bd843da8def6d322226673735aaa7c6820975ff94322a91f6c95df5d3d.0.png',
//    'box_office' => '123',
//    'director' => 1,
//    'release_date' => '2022-04-05',
//    'phase' => 1,
//        );
//        $expected[] = array(
//            'title' => 'test',
//            'img_name' => '2272e4bd843da8def6d322226673735aaa7c6820975ff94322a91f6c95df5d3d.0.png',
//            'box_office' => '123',
//            'director' => 1,
//            'release_date' => '2022-04-05',
//            'phase' => 1,
//        );
//
//        $result = validateFormData($array);
//
//        $this->assertEquals($expected, $result);
//    }


}