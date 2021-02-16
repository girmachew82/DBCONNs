<?php
class Staff extends User{
    private $salary;
    
    public function __construct($id,$name)
    {
        parent::__construct($id,$name);
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    public function getSalary()
    {
        return $this->salary;
    }
}
?>