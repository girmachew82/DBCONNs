<?php
class Course{
    public $code;
    public $title;
    public  function setCode($code)
    {
        $this->code = $code;
    }
    public  function getCode()
    {
       return $this->code;
    }
    public  function setTitle($title)
    {
        $this->title = $title;
    }
    public  function getTitle()
    {
      return  $this-> title;
    }
}
$course1 = new Course();
$course1->setCode("CoCS4181");
$course1->setTitle("Selected Topic in CS");
echo "Course Detials <br>";
echo $course1 ->getCode();
echo $course1->getTitle();
?>