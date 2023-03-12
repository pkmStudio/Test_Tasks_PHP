<?php

$row = 1;
$number = 1;
$numericalRow = '';
$end = 100;


while ($number <= $end) {
   // echo 'Это строка - '. $row . ' А начинается с числа - ' . $number . '| ';
   for ($i=0; $i < $row; $i++) { 
      if ($number <= $end) {
         $numericalRow .= $number . ' ';
         $number++;
      } else {break;}
   }

   echo $numericalRow . '<br><br>';
   $numericalRow = '';
   $row++;
}
/**
 * Номер ряда равен числу значений в строке
 * Поэтому цикл с 0 до значения номера строки
 * Внутри делаем проверку на то, что бы числа не перешли за границу
 * И устанавливаем такое же ограничение во внешнем цикле.
 */