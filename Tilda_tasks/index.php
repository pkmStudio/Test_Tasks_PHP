<?php
session_start();

// Task # 1 - ladder
echo '<hr><h2>Задача 1: лесенка</h2>';

require 'app/taskOne.php';


// Task # 2 - matrix
echo '<hr><h2>Задача 2: массивы</h2>';

require 'app/taskTwo.php';

// Выводим массив
var_dump($matrix57);

// Выводим суммы элементов строк массива
print_r($rowSum);

// Выводим суммы элементов столбцов массива
print_r($columnSum);


// Task # 3 - matrix
echo '<hr><h2>Задача 3: фронт</h2>';

require 'app/taskThree.php';
require 'app/view/front.php';