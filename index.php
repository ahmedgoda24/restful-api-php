<?php


require "app.php";

$userapi=new UserApi;
$userapi->all("v1","user","all",$url,$user);
$userapi->add("v1","user","add",$url,$user);
$userapi->update("v1","user","update",$url,$user);
$userapi->delete("v1","user","delete",$url,$user);



