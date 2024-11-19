<?php

function workWithCounter(object $file, string $line, $firstLetter, $lastFirstLetter): void
{
    //    Counter
    $countOfLetters = substr_count($line, $firstLetter);
    if ($firstLetter === $lastFirstLetter) {
        $counter = $file->openFileAsString(ROOT . "/public/library/$firstLetter/count.txt");
        if ($counter) {
            $countOfLetters = (int)$counter + $countOfLetters;
        }

        $file->rewriteFile(ROOT . "/public/library/$firstLetter", "/count.txt", $countOfLetters);
    } else {
        $openFile = $file->openFileAsString(ROOT . "/public/library/$firstLetter/count.txt");
        if (!$openFile) {
            $file->rewriteFile(ROOT . "/public/library/$firstLetter", "/count.txt", $countOfLetters);
        }
    }

}

function workWithLine(object $file, string $line): string
{
    //   clear Line and set String in to directory file
    $line = mb_strtolower(trim($line));
    $firstLetter = mb_substr($line, 0, 1);
    $file->setStringToEndFile(ROOT . "/public/library/$firstLetter", "/words.txt", $line);
    return $firstLetter;
}

function saveFile(): bool|string
{
    $saveFile = '/public/' . time() . $_FILES['file']['name'];
    $result = move_uploaded_file($_FILES['file']['tmp_name'], (ROOT . $saveFile));
    if (!$result) {
        return false;
    }
    return $saveFile;
}

function checkCLI(): bool
{
    if ( defined('STDIN') )
    {
        return true;
    }

    if ( php_sapi_name() === 'cli' )
    {
        return true;
    }

    if ( array_key_exists('SHELL', $_ENV) ) {
        return true;
    }

    if ( empty($_SERVER['REMOTE_ADDR']) and !isset($_SERVER['HTTP_USER_AGENT']) and count($_SERVER['argv']) > 0)
    {
        return true;
    }

    if ( !array_key_exists('REQUEST_METHOD', $_SERVER) )
    {
        return true;
    }

    return false;
}

function getPath (bool $isCli): string|false
{
    // TODO 'php ./public/index.php -pC:\Your\path\to\this\directory\fluidTest\public\russian.txt'
    if($isCli) {
        $options = getopt("p:");
        if (isset($options['p'])) {
            return $options['p'];
        }
        return false;
    }

    if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_FILES['file'])) {
        $path = saveFile();
        if (!$path) {
            return false;
        }
        return ROOT . $path;
    }

    return false;
}

function getSortedFileByFirstLetters(object $file): array
{
    $lastFirstLetter = 'test';
    while (($line = $file->readLine())!== false) {
        $line = $file->encodeToUTF8($line);
        if (!$line) {
            return ['status' => false, 'massage' => 'Контент файла в неподдерживаемой кодировке. Переведите текст файла в кодировку UTF-8.'];
        }
        $firstLetter = workWithLine($file, $line);
        workWithCounter($file, $line, $firstLetter, $lastFirstLetter);
        $lastFirstLetter = $firstLetter;
    }
    $result = $file->closeFile();

    if ($result) {
        return ['status' => true, 'message' => 'Все сделали и разложили по папочкам'];
    }
    return ['status' => false, 'massage' => 'Контент файла в неподдерживаемой кодировке. Переведите текст файла в кодировку UTF-8.'];
}