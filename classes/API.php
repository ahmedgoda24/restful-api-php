<?php

abstract class Api
{

    public function all(string $version, string $TableName, string $CrudName, $url, $objName,)
    {
        if ($url[1] == "v1")

            if ($url[2] == $TableName) {
                if ($url[3] == $CrudName) {
                    if ($CrudName == "all") {

                        $data = $objName->selectAllLimit();
                    }
                    $res = [
                        'status' => 200,
                        'data' => $data
                    ];
                    echo json_encode($res);
                }
            }
    }
    abstract public function add(string $version, string $TableName, string $CrudName, $url, $objName);

    abstract public function update(string $version, string $TableName, string $CrudName, $url, $objName);

    public function delete(string $version, string $TableName, string $CrudName, $url, $objName)
    {
        header("Access-Control-Allow-Methods: DELETE");
        if ($url[1] == "v1") {

            if ($url[2] == $TableName) {
                if ($url[3] == $CrudName) {
                    $jsonText= file_get_contents("php://input");
                    $json = json_decode($jsonText);
                    $id=$json->id;                 
                    $res = $objName->delete($id);   
                    if ($res) {
                        $res = [
                            'status' => 201,
                            'msg' => "user deleted succssefully"
                        ];
                    } else {
                        http_response_code(404);
                        $res = [
                            'status' => 400,
                            'msg' => "error"
                        ];
                    }
                    
                    echo json_encode($res);
                    
                }
            }
        }
    }
    

}


class UserApi extends Api
{

    public function add(string $version, string $TableName, string $CrudName, $url, $objName)
    {
        header("Access-Control-Allow-Methods: POST");
        if ($url[1] == "v1") {

            if ($url[2] == $TableName) {
                if ($url[3] == $CrudName) {
                    $jsonText= file_get_contents("php://input");
                    $json = json_decode($jsonText);
                    $name= $json -> name;
                    $email = $json -> email;
                    $password = $json -> password;                      
                    $res = $objName->insert("name,email,password", "'$name','$email','$password'");   
                    if ($res) {
                        $res = [
                            'status' => 201,
                            'msg' => "user addedd succssefully"
                        ];
                    }else {
                        http_response_code(404);
                        $res = [
                            'status' =>404 ,
                            'msg' => "error"
                        ];
                    }
                    
                    echo json_encode($res);
                    
                }
            }
        }
    }
    public function update(string $version, string $TableName, string $CrudName, $url, $objName)
    {
        header("Access-Control-Allow-Methods: POST");
        if ($url[1] == "v1") {

            if ($url[2] == $TableName) {
                if ($url[3] == $CrudName) {
                    $jsonText= file_get_contents("php://input");
                    $json = json_decode($jsonText);
                    $name= $json -> name;
                    $email = $json -> email;
                    $password = $json -> password;
                    $id=$json->id;                 
                    $res = $objName->update("name='$name',email='$email',password='$password'",$id);   
                    if ($res) {
                        $res = [
                            'status' => 201,
                            'msg' => "user Updated succssefully"
                        ];
                    } else {
                        http_response_code(400);
                        $res = [
                            'status' => 400,
                            'msg' => "error"
                        ];
                    }
                    
                    echo json_encode($res);
                    
                }
            }
        }
    }

}
class OrderApi extends Api
{
    public function add(string $version, string $TableName, string $CrudName, $url, $objName){}
    public function update(string $version, string $TableName, string $CrudName, $url, $objName){}


}
