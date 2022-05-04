<?php

namespace Config;



class Controller
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_init();
        $this->conn->ssl_set(
          NULL,
          NULL,
          "./cert.pem",
          NULL,
          NULL
        );
        $this->conn->real_connect(
          '05cr8wjw5112.us-east-1.psdb.cloud',
          '2znbpudm9tj7',
          'pscale_pw_-b7q8hly1wp0k8kz_eJ_TwLdKQh8IExKmYv3kPvzXPo',
          'invoice'
        );
    }
    public function resjson($data = [], $status = 200, array $headers = [], $options = 0){
        header("HTTP/1.1");
        header("Content-Type:application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }

    public function view($url){
      include './views/layouts/dashboard/header.php';
      $url = explode(".",$url);
      include './views/'.$url[0].'/'.$url[1].'.php';
      include './views/layouts/dashboard/footer.php';
    }

    public function header(){
        return include './views/layouts/dashboard/header.php';
    }

    public function footer(){
        return include './views/layouts/dashboard/footer.php';
    }
    
}
