<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once ROOT . '/app/WorkWithFile.php';
require_once ROOT . '/config/functions.php';

$lastFirstLetter = 'test';
$file = new WorkWithFile();

//PHP CLI
// TODO 'php ./public/index.php -pC:\Your\path\to\this\directory\fluidTest\public\russian.txt'
$options = getopt("p:");
if (isset($options['p'])) {
    $handle = $file->openFile($options['p']);
}

//PHP SERVER
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $path = saveFile();
    }
    if (!$path) {
        die('Файл не удалось открыть, возможно вы загрузили не тот файл или файл поврежден.');
    }
    $handle = $file->openFile(ROOT . $path);
}


if (isset($handle) && !$handle) {
    die('Файл не удалось открыть, возможно вы загрузили не тот файл или файл поврежден.');
}


if (isset($handle)) {
    while (!feof($handle)) {
        $line = $file->readLine();
        $line = $file->encodeToUTF8($line);
        if ($line === false) {
            die('Контент файла в неподдерживаемой кодировке. Переведите текст файла в кодировку UTF-8.');
        }
        $firstLetter = workWithLine($file, $line);
        workWithCounter($file, $line, $firstLetter, $lastFirstLetter);
        $lastFirstLetter = $firstLetter;
    }

    $result = $file->closeFile();
    if ($result) {
        echo "Все сделали и разложили по папочкам";
    }
}

//Обертка из-за CLI возможно есть более простой способ разделить реализацию от представления.
if (!isset($handle)) {
    require_once VIEWS . "/index.tpl.php";
}



