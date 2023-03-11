<?php
// Прородитель деревьев.
namespace app\tree;

abstract class Tree
{
   // Эта функция подсчитывает колличество плодов для каждого дерева. И отдает рандомный массив в виде. [40, 49, 43, 46, и т.д.]
   abstract protected function getValue($value);

   // Эта функция принимает массив от getValue и отдает заказ ввиде ['appleTree' => [40, 49, 43, 46, и т.д.]]
   abstract protected function getTree($value);

}

