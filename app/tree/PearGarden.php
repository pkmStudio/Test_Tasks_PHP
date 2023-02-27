<?php
namespace app\tree;

use app\tree\Tree;

class PearGarden extends Tree
{

   private $pearsInPearTrees = [];
   private $pearTrees = [];

   // Приезжает робот в сад и говорит, дайте мне value груш. Продавец: - Окей.
   public function getTree($value)
   {
      $this->pearTrees = [
         'pearTree' => $this->getValue($value)];
      return $this->pearTrees;
   }

   // Природа закладывает генетически, сколько груш вырастет.
   public function getValue($value)
   {
      for ($tree=0; $tree < $value; $tree++) { 
         $this->pearsInPearTrees[] = rand(0, 20);
      }
      return $this->pearsInPearTrees;
   }   
}
