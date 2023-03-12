<?php
// Функция, которая сравнивает полученные данные от сервиса с нашим массивом конфигураций.
function matches($array, $regions)
{
   // Если регион вообще есть
   if ($array->region){
      $regionName = $array->region->name_ru;

      foreach ($regions as $region => $params) {
         if (preg_match($region, $regionName)) {

            return $params;
         }
      }
   }

   // Если нужного региона нет, то возвращаем параметры головного офиса. Но со *
   return [
      "notFind" => true,
      "hrefTel" => "+78004504545",
      "telephone" => "+7 (800) 450-45-45"
   ];
}

// Подключаем файл конфигураций
$regions = require 'config/regions.php';

// Получаем Ip пользователя
$userIp = $_SERVER['REMOTE_ADDR'];

// Отправляем запрос и декодируем ответ
$request = file_get_contents("http://api.sypexgeo.net/json/" . $userIp); 
$array = json_decode($request);

// Заполняем перменную парамметрами
$region = matches($array, $regions);

if (isset($region['notFind'])) {
   $_SESSION['notFind'] = $region['notFind'];
   $_SESSION['hrefTel'] = $region['hrefTel'];
   $_SESSION['telephone'] = $region['telephone'];
} else {
   $_SESSION['regionName'] = $region['name'];
   $_SESSION['hrefTel'] = $region['hrefTel'];
   $_SESSION['telephone'] = $region['telephone'];
}