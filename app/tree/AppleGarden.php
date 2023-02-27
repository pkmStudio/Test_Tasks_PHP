<?php
namespace app\tree;

use app\tree\Tree;

class AppleGarden extends Tree
{

   private $applesInAppleTrees = [];
   private $appleTrees = [];

   // Приезжает робот в сад и говорит, дайте мне value яблонь. Продавец: - Окей.
   public function getTree($value)
   {
      $this->appleTrees = [
         'appleTree' => $this->getValue($value)];
      return $this->appleTrees;
   }

   // Природа закладывает генетически, сколько яблок вырастет.
   public function getValue($value)
   {
      for ($tree=0; $tree < $value; $tree++) { 
         $this->applesInAppleTrees[] = rand(40, 50);
      }
      return $this->applesInAppleTrees;
   }   
}
