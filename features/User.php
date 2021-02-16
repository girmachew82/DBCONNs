<?php
class User {
 
    public $id;
    public $name;
    
    public function __construct($id, $name)
    {
        $this->id =$id;
        $this->name =$name;

    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setname($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    
}

?>