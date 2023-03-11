<?php
namespace app;

use app\model\RobotModel;
use app\tree\AppleGarden;
use app\tree\PearGarden;

class Robot
{
   public $model;
   private $trees = [];
   private $pearTrees = [];
   private $appleTrees = [];
   private $appleGarden;
   private $pearGarden;

   public function __construct() {
      $this->appleGarden = new AppleGarden;
      $this->pearGarden  = new PearGarden;
      $this->model = new RobotModel;
   }
   // Говорим: Поезжай купи столько яблонь и столько груш. Получаем Массив из двух сортов деревьев. 
   private function getTree($appleTree, $pearTree)
   {
      $this->appleTrees = $this->appleGarden->getTree($appleTree);
      $this->pearTrees = $this->pearGarden->getTree($pearTree);
      $this->trees = $this->appleTrees + $this->pearTrees;
   }

   // Говорим: перебери каждое дерево, подпиши его и посади.
   private function setTree($trees)
   {
      foreach ($trees as $tree => $fruits) {
         foreach($fruits as $value) {
            $fruitTree = ['name' => $tree, 'fruits' => $value];
            $this->model->setTree($fruitTree);
         }
      }
   }

   // Говорим: Сделай сад. Он такой: А как? А мы ему: В начале getTree, потом setTree. 
   public function setGarden($appleTree, $pearTree)
   {
      $this->getTree($appleTree, $pearTree);
      $this->setTree($this->trees);
      $this->trees = [];
   }   

   // Говорим: Иди собери урожай.
   public function getHarvest($fruitTrees = [])
   {
      foreach ($fruitTrees as $fruitTree) {
         $fruits = $this->model->getHarvest($fruitTree);
         $harvest = array_sum($fruits);
         $this->trees[]= "{$fruitTree} дали столько плодов - {$harvest}";
      }
      return $this->trees;
   }

}
