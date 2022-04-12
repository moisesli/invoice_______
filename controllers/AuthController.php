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

    $q = $db->query('select * from usuarios where usuario = ? && password = ?',[
      'usuario' => 'elnaufrago2009@gmail.com',
      'password' => 'moiseslinar3s'
    ]);

    if ($q->count() == 1){
      $global = $db->query('select usuarios.nombres,
        usuarios.usuario,
        usuarios.empresa_id,
        roles.id,
        roles.nombre,
        empresas.razon_social,
        empresas.ruc,
        empresas.direccion,
        empresas.ubigeo
        from usuarios
             inner join roles on usuarios.role_id = roles.id
             inner join empresas on usuarios.empresa_id = empresas.id
        where usuario = ? && password = ? ',[
        'usuario' => 'elnaufrago2009@gmail.com',
        'password' => 'moiseslinar3s'
      ]);
      print_r($global->all());
    }
    //$q = $db->select('roles',['id', '=', '1']);
    //print_r($q->count());
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