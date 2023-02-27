<?php 
// Исполнительный файл

use app\Robot;

require 'debug.php';
require 'autoload.php';

$fruitTrees = ['appleTree', 'pearTree'];

$robot = new Robot;

$robot->setGarden(10, 15);
$result = $robot->getHarvest($fruitTrees);

print_r ($result);