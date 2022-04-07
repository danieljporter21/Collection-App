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

    public function testValidationGivenGoodArrayReturnTrue()
    {
        $input = array(
            'title' => 'IronMan',
            'boxOffice' => 123,
            'director' => 'John Favreau',
            'releaseDate' => '21-07-1994',
            'phase' => 'One'
        );

        $result = validateFormData($input);

        $expected = true;

        $this->assertEquals($expected, $result);
        $this->assertisArray($input);
    }

    public function testGivenNonArrayToValidateReturnError()
    {
        $string = 'hello';

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = validateFormData($string);
    }

    public function testGivenNonArrayToSanitiseReturnError()
    {
        $string = 'hello';

        $this->expectException(TypeError::class);

        //Act - calling the function
        $result = sanitiseFormData($string);
    }

    public function testValidationGivenStringDateInArrayReturnFalse()
    {
        $input = array(
            'title' => 'IronMan',
            'boxOffice' => 123,
            'director' => 'John Favreau',
            'releaseDate' => 'hello',
            'phase' => 'One'
        );

        $result = validateFormData($input);

        $expected = false;

        $this->assertEquals($expected, $result);
    }

    public function testValidationGivenOldDateInArrayReturnFalse()
    {
        $input = array(
            'title' => 'IronMan',
            'boxOffice' => 123,
            'director' => 'John Favreau',
            'releaseDate' => formatDate('21-07-1980'),
            'phase' => 'One'
        );

        $result = validateFormData($input);

        $expected = false;

        $this->assertEquals($expected, $result);
    }

    public function testValidationGivenStringForBoxOfficeReturnFalse()
    {
        $input = array(
            'title' => 'IronMan',
            'boxOffice' => 'hello',
            'director' => 'John Favreau',
            'releaseDate' => '21-07-1994',
            'phase' => 'One'
        );

        $result = validateFormData($input);

        $expected = false;

        $this->assertEquals($expected, $result);
    }

    public function testGivenArrayReturnCleanArray()
    {
        $input = array(
            'title' => 'IronMan',
            'boxOffice' => 123,
            'director' => 'John Favreau',
            'releaseDate' => '21/07/1994',
            'phase' => 'One'
        );

        $result = sanitiseFormData($input);

        $expected = $input;

        $this->assertEquals($expected, $result);
    }

    public function testGivenEmptyArrayReturnCleanArray()
    {
        $input = [];

        $result = sanitiseFormData($input);

        $this->assertIsArray($result);
    }
}
