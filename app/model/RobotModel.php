<?php
namespace app\model;

use app\lib\Db;
use PDO;

class RobotModel
{

   private $pdo;
   public function __construct() {
      $this->pdo = Db::getInstanse();
   }

   // Говорим: Вот дерево - добавь его в сад.
   public function setTree($tree)
   {
      $sql = 'INSERT INTO garden (tree, fruits) VALUES (?, ?)';
      $query = $this->pdo->prepare($sql);
      $query->execute([$tree['name'], $tree['fruits']]);
   }

   // Говорим: Иди собери урожай такого-то дерева.
   public function getHarvest($tree)
   {
      $sql = 'SELECT `fruits` FROM garden WHERE tree = ?';
      $query = $this->pdo->prepare($sql);
      $query->execute([$tree]);
      $result = $query->fetchAll(PDO::FETCH_COLUMN);
      return $result;
   }
   
   public function fire()
   {
      $sql = 'DELETE FROM garden';
      $query = $this->pdo->prepare($sql);
      $query->execute();
   }

}
