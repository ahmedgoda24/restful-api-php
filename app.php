
<?php

require "classes/Model.php";
require "classes/API.php";
$order=new Order;
$employee=new Employees;
$product=new Product;
$user=new Users;
$url=$_SERVER["QUERY_STRING"];
$url=explode("/",$url);
header('Access-Control-Allow-Origin:application/json');
header('Content-Type: application/json');


// http_response_code(404);

/*
//$url v1/test/all
url[1]=v1
url[2]=test
url[3]=all

localhost/api/v1/test/all
*/

/*

//this is the base structure and create all operation in $url[3]
//iam toke this shabe and convert to oop and used 
if($url[1]=="v1")
{
    if($url[2]=="test"){
        if($url[3]=="all"){
            echo "all";
        }elseif($url[3]=="add"){
            echo "add"; 
        }elseif($url[3]=="update"){
            echo "update";
        }elseif($url[3]=="delete"){
            echo "delete";
        }
    }

}else{

}
*/