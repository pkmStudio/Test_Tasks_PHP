<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once ROOT . '/app/FileWorker.php';
require_once ROOT . '/config/functions.php';

$isCli = checkCli(); // Проверяем через что открыто
$path = getPath($isCli); // Получаем путь к файлу

if($path) {
    $file = new FileWorker($path);
    if ($file->isOpenFile) {
        $result = getSortedFileByFirstLetters($file);
    } else {
        die('Не удалось открыть файл.');
    }
    if (isset($result['status'])) {
        echo $result['message'];
    }
}

if (!$isCli) {
    require_once VIEWS . "/index.tpl.php";
}



