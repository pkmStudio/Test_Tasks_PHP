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
// В теории можно эти 2 функции вынести за скобки создать еще один класс по типу WorkWithDictionary

function saveFile(): bool|string {
    $saveFile = '/public/' . time() . $_FILES['file']['name'];
    $result = move_uploaded_file($_FILES['file']['tmp_name'], (ROOT . $saveFile));
    if(!$result) {
        return false;
    }
    return $saveFile;
}