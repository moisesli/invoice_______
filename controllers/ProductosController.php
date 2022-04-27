<?php
namespace Controllers;
use Config\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductosController extends Controller {

    public function index(){
        include './views/productos/index.php';
    }

    public function list(){
      $res = $this->conn->query("
        select * from productos
      ");

      print_r($res->fetch_all());
      /*return $this->resjson([
        'suceess' => true,
        'items' => $res->fetch_object()
      ]);*/
    }
}
