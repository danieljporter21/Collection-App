<?php

require_once 'db.php';
require_once 'fnclib.php';

$db = 'CollectionApp';
$connection = (connectToDB($db));

function uploadFile(): string
{
    try {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it as invalid.
        if (!isset($_FILES['newFile']['error'])
            || is_array($_FILES['newFile']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['newFile']['error'] value.
        switch ($_FILES['newFile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown error.');
        }

        $tempFilename = $_FILES['newFile']['tmp_name'];

        $fileSize = filesize($tempFilename);

        if ($fileSize === 0) {
            throw new RuntimeException('The file is empty.');
        }

        if ($fileSize > 100000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // As the $_FILES['upfile']['mime'] value could be tampered with we will
        // check it ourselves.
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $fileFormat = $finfo->file($tempFilename);

        $allowedTypes = [
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ];

        $isValidFormat = in_array(
            $fileFormat,
            array_keys($allowedTypes),
            true);

        if (false === $isValidFormat) {
            throw new RuntimeException('Invalid file format.');
        }

        $extension = $allowedTypes[$fileFormat];

        // The uploaded file needs naming uniquely.
        // We should not trust $_FILES['upfile']['name'] in case it contains
        // something dodgy.
        // Hashing the given name will make it both unique and safe.
        $safeUniqueName = sha1_file($tempFilename) . '.' . $extension;

        // __DIR__ is the directory of the current PHP file
        $targetDirectory = __DIR__ . '/Images';
        $newFilepath = $targetDirectory . '/' . $safeUniqueName;

        if (!move_uploaded_file($tempFilename, $newFilepath)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return '-success-' . $safeUniqueName;

    } catch (RuntimeException $e) {
        return $e->getMessage();
    }
}

$imageString = uploadFile(); // this calls the function and puts the return value in $imageString

if (strpos(strtolower($imageString), 'success')) { // if the variable contains the string 'success'

    $imageString = substr($imageString, 9); // remove the first 9 characters from -success-
}


function addToDB(PDO $pdo, string $imageName)
{

    $query = $pdo->prepare(
        'INSERT INTO `films` (`title`,`box_office`,`director`,`phase`,`release_date`,`img_name`)'
        . 'VALUES (:newTitle,:newBoxOffice,:newDirector,:newPhase,:newReleaseDate,:newImage)'
    );


    $title = $_POST['title'];
    $boxOffice = $_POST['boxOffice'];
    $director = $_POST['director'];
    $phase = $_POST['phase'];
    $date = formatDate($_POST['releaseDate']);
    $image = $imageName;

    $query->bindParam(':newTitle', $title);
    $query->bindParam(':newBoxOffice', $boxOffice);
    $query->bindParam(':newDirector', $director);
    $query->bindParam(':newPhase', $phase);
    $query->bindParam(':newReleaseDate', $date);
    $query->bindParam(':newImage', $image);

    $query->execute();
}

echo addToDB($connection, $imageString);
//var_dump(addToDB($connection,$imageString));
header("Location: index.php");