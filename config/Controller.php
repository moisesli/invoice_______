<?php

namespace Config;



class Controller
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_init();
        $this->conn->ssl_set(NULL, NULL, "`/etc/ssl/cert.pem`", NULL, NULL);
        $this->conn->real_connect('05cr8wjw5112.us-east-1.psdb.cloud', '1na7g1otd85h', 'pscale_pw_QhscZT4QdaJPzdt_E7XzSA6m4SF6ALVmFBTUNhTOYAw', 'invoice');
    }
    public function resjson($data = [], $status = 200, array $headers = [], $options = 0){
        header("HTTP/1.1");
        header("Content-Type:application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
    
}
