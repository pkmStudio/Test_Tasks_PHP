<?php

function search(array $data, int $number): int
{
    $arrayLength = count($data);
    $minBorder = 0;
    $maxBorder = $arrayLength - 1;

    while ($minBorder <= $maxBorder) {
        $searchNumber = (int)round(($minBorder + $maxBorder) / 2);
        if ($number == $data[$searchNumber]) {
            return $searchNumber;
        }
        if ($number > $data[$searchNumber]) {
            $minBorder = $searchNumber + 1;
        }
        if ($number < $data[$searchNumber]) {
            $maxBorder = $searchNumber - 1;
        }
    }
    return -1;
}

function  weekend(string $begin, string $end): int
{
    $countOfWeekendDays = 0;
    $firstDate = strtotime($begin);
    $endDate = strtotime($end);

    // Если указан неверно порядок дат
    if ($firstDate > $endDate) {
        throw new InvalidArgumentException('Begin date must be less than or equal to end date.');
    }
    //    Высчитываем к какому дню относится начальная дата и на сколько надо откатить время.
    if (date("w", $firstDate) <= 6 && date("w", $firstDate) > 0) {
        $str = '-' . date("w", $firstDate) - 1 . ' day';
        $firstDate = strtotime($str, $firstDate);
    }
    if (date("w", $firstDate) == 0) {
        $firstDate = strtotime("+1 day", $firstDate);
        $countOfWeekendDays++;
    }

    //    Высчитываем к какому дню относится конечная дата и на сколько надо откатить время.
    if (date("w", $endDate) < 6 && date("w", $endDate) > 0) {
        $str = '-' . date("w", $endDate) - 1 . ' day';
        $endDate = strtotime($str, $endDate);
    }
    if (date("w", $endDate) == 6) {
        $endDate = strtotime("-5 day", $endDate);
        $countOfWeekendDays++;
    }
    if (date("w", $endDate) == 0) {
        $endDate = strtotime("+1 day", $endDate);
    }
    // Считаем колличество недель и т.к. в каждой неделе 2 выходных, то умножаем количество недель на 2
    $weekends = ($endDate - $firstDate) / 302400;
    return $countOfWeekendDays + $weekends;
}

//function rgb(int $r, int $g, int $b):int
//{
//    return (256*256*$b)+(256*$g)+$r;
//}

function rgb(int $r, int $g, int $b): int
{
    if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
        throw new InvalidArgumentException('Values must be between 0 and 255.');
    }
    return ($b << 16) | ($g << 8) | $r;
}



function fiborow(int $limit): string
{
    $row = '0 1';
    $fiboPreNum = 0;
    $fiboLastNum = 1;

    if ($limit == 0) {
        return 0;
    }
    if ($limit < 0) {
        throw new InvalidArgumentException('Value must be more 0.');
    }
    while (($fiboPreNum + $fiboLastNum) <= $limit) {
        $fiboCurrentNum = $fiboPreNum + $fiboLastNum;
        $fiboPreNum = $fiboLastNum;
        $fiboLastNum = $fiboCurrentNum;

        $row .= ' ' . $fiboCurrentNum;
    }
    return $row;
}