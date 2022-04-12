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

  public function login()
  {

    $db = new DB('05cr8wjw5112.us-east-1.psdb.cloud', 'vpjfb2ewapce', 'pscale_pw_TZEawdCs7uZZc4OcMBJDVTQ7gdyy9ZHlZRqwCVEbc1U', 'invoice');

    $q = $db->query('select * from usuarios where usuario = ? && password = ?', [
      'usuario' => 'elnaufrago2009@gmail.com',
      'password' => 'moiseslinar3s'
    ]);

    if ($q->count() == 1) {
      $global = $db->query('select 
        usuarios.nombres as usuario_nombres,
        usuarios.usuario as usuario_usuario,        
        roles.id as role_id,
        roles.nombre as role_nombre,
        empresas.id as empresa_id,
        empresas.razon_social as empresa_razon_social,
        empresas.ruc as empresa_ruc,
        empresas.direccion as empresa_direccion,
        empresas.ubigeo as empresa_ubigeo
        from usuarios
             inner join roles on usuarios.role_id = roles.id
             inner join empresas on usuarios.empresa_id = empresas.id
        where usuario = ? && password = ? ', [
        'usuario' => 'elnaufrago2009@gmail.com',
        'password' => 'moiseslinar3s'
      ]);
      session_start();
      $_SESSION["usuario_nombres"] = $global->first()->usuario_nombres;
      $_SESSION["usuario_usuario"] = $global->first()->usuario_usuario;
      $_SESSION["role_id"] = $global->first()->role_id;
      $_SESSION["role_nombre"] = $global->first()->role_nombre;
      $_SESSION["empresa_id"] = $global->first()->empresa_id;
      $_SESSION["empresa_razon_social"] = $global->first()->empresa_razon_social;
      $_SESSION["empresa_ruc"] = $global->first()->empresa_ruc;
      $_SESSION["empresa_direccion"] = $global->first()->empresa_direccion;
      $_SESSION["empresa_ubigeo"] = $global->first()->empresa_ubigeo;
      return $global->first()->usuario_nombres;      
      exit();
    }

  }
}