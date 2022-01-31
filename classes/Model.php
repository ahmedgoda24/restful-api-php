<?php

require "Db.php";

class Employees extends Db{
    public function __construct()
    {
        $this->table="employees";
        $this->connect();
    }
}


class Product extends Db{
    public function __construct()
    {
        $this->table="products";
        $this->connect();
    }
   
}

class Order extends Db{
    public function __construct()
    {
        $this->table="orders";
        $this->connect();
    }
}


class Users extends Db{
    public function __construct()
    {
        $this->table="users";
        $this->connect();
    }
}