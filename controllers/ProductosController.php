<?php
namespace Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductosController {
    public function index(){
        include './views/productos/index.php';
    }
}
