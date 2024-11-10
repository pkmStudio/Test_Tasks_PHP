<?php
require_once('functions.php');
$data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$search = search($data, 5);

$day1 = '05.10.2024';
$day2 = '06.10.2024';
$weekends = weekend($day1, $day2);

$rgb = rgb(0, 0, 255);

$fiborow = fiborow(33);

