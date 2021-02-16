<?php
interface IRepository{
    public function db_connect();
    public function insert($data);
    public function delete($data);
    public function update($data);
    public function read();
}

?>