<?php
abstract class DBCommonMethod{
    public $host ;
    public $user ;
    public $pass ;
    public $dbname;

    public function __construct($host,$user,$pass,$dbname)
    {
        $this->host= $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }
}

?>