<?php

namespace Controllers;
use Config\DB;
use Config\Controller;

class AuthController extends Controller
{

  public function index()
  {
    return 'registro';
  }

  public function login(){
    $db = new DB('05cr8wjw5112.us-east-1.psdb.cloud', 'vpjfb2ewapce', 'pscale_pw_TZEawdCs7uZZc4OcMBJDVTQ7gdyy9ZHlZRqwCVEbc1U', 'invoice');

    //$db->insert('usuarios', ['nombres' => 'linares']);

    $q = $db->select('roles',['id', '=', '1']);
    print_r($q->all());
    /*if ($db->error() && $db->count() > 0) {
      foreach ($q->all() as $obj){
        echo "Value of index1: {$obj->nombres}<br>";
        echo "Value of index2: {$obj->dni}<br>";
      }
    }*/

    //$data = $request->toArray();
    //return $this->resjson($data);
  }
}