<?php

// Функция, которая смотрит есть ли значение в массиве
function inArray($array, $value)
{
   for ($row=0; $row < count($array); $row++) { 
      if(in_array($value, $array[$row])) {return true;}
   }

   // Второй вариант
   // foreach ($array as $row) {
   //    if(in_array($value, $row)) {return true;}
   // }

   return false;
}

// Функция, которая заполняет массив рандомными значениями, заданного диапазона
function fillArrayWithRandValue($rowCount, $columnCount, $minValue, $maxValue)
{
   $array = [];

   for ($row=0; $row < $rowCount; $row++) { 
      for ($column=0; $column < $columnCount; $column++) { 
   
         $randValue = mt_rand($minValue, $maxValue);
   
         if(!inArray($array, $randValue)){
            $array[$row][$column] = $randValue;
         } else {$column--;}
   
      }
   }

   return $array;
}

// Функция, которая считает сумму элементов массива в строке
function rowSumInArray($array, $rowCount = 1)
{
   $sum = '<br><br> Суммы элементов в строках <br><br>';

   // for ($row=0; $row < $rowCount; $row++) { 
   //    $rowSum = array_sum($array[$row]);
   //    $sum .= 'Сумма ' . $row . ' строки: ' . $rowSum . ' <br><br>';
   // }

   //Второй вариант
   foreach ($array as $row) {
      $index = array_search($row, $array);
      $rowSum = array_sum($row);
      $sum .= 'Сумма ' . $index . ' строки: ' . $rowSum . ' <br><br>';
   }

   return $sum;
}

// Функция, которая считает сумму элементов массива в столбце
function columnSumInArray($array, $columnCount)
{
   $sum = '<br><br> Суммы элементов в столбцах <br><br>';

   for ($column=0; $column < $columnCount; $column++) { 
      $columnArray = array_column($array, $column);
      $columnSum = array_sum($columnArray);

      $sum .= 'Сумма ' . $column . ' столбца: ' . $columnSum . ' <br><br>';
   }

   return $sum;
}

// Объявляем характеристики будущего массива
$rowCount = 5;
$columnCount = 7;
$minValue =1;
$maxValue = 35;

// Заполняем массив уникальными значениями
$matrix57 = fillArrayWithRandValue($rowCount, $columnCount, $minValue, $maxValue);

// Считаем суммы элементов строк массива
$rowSum = rowSumInArray($matrix57, $rowCount);

// Считаем суммы элементов столбцов массива
$columnSum = columnSumInArray($matrix57, $columnCount);