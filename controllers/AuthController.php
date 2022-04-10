<?php

namespace Controllers;
use Config\DB;
use Config\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 
class AuthController extends Controller
{

  public function index()
  {
    return 'registro';
  }

  public function login(Request $request, Response $response){
    $db = new DB('localhost', 'root', '', 'invoice');

    //$db->insert('usuarios', ['nombres' => 'linares']);

    $q = $db->select('usuarios',
      [
        'usuario', '=', 'elnaufrago2009@gmail.com',
        'password', '=', 'moiseslinar3s'
      ]);
    print_r($db->all());
    /*if ($db->error() && $db->count() > 0) {
      foreach ($q->all() as $obj){
        echo "Value of index1: {$obj->nombres}<br>";
        echo "Value of index2: {$obj->dni}<br>";
      }
    }*/

    $data = $request->toArray();
    //return $this->resjson($data);
  }
}