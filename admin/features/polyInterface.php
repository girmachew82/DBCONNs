<?php
   interface Shape {
      public function area();
   }

   class Circle implements Shape {
      private $radius;
      public function __construct($radius){
         $this -> radius = $radius;
      }
      public function area(){
         return $this -> radius * $this -> radius * pi();
      }
   }
   class Rectangle implements Shape {
      private $width;
      private $height;
      public function __construct($width, $height){
         $this -> width = $width;
         $this -> height = $height;
      }
      public function area(){
         return $this -> width * $this -> height;
      }
   }
   $mycirc = new Circle(3);
   $myrect = new Rectangle(3,4);
   echo $mycirc->area();
   echo $myrect->area();
?>