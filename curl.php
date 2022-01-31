<?php

require "classes/Model.php";


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://jsonplaceholder.typicode.com/users");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
$server_output=json_decode($server_output,true);
$newdata=[];
$order=new Order;
foreach ($server_output as $key => $value) 
{

      $name=  $newdata[$key]["name"]=$value["name"];
      $email=  $newdata[$key]["email"]=$value["email"];
      $street=  $newdata[$key]["address_street"]=$value["address"]["street"];
      $city=  $newdata[$key]["address_city"]=$value["address"]["city"];
     $order->insert("name,email,street,city","'$name','$email','$street','$city'");
    
}



