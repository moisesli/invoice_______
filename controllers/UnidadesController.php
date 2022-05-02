<?php

namespace Controllers;

use Config\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnidadesController extends Controller
{
  public function list(){
    $unidades = $this->conn->query("select * from unidades")->fetch_all(MYSQLI_ASSOC);
    return $this->resjson([
      'suceess' => true,
      'unidades' => $unidades
    ]);
  }
}