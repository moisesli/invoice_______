<?php

namespace Controllers;

use Config\Controller;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

  public function index()
  {
    return 'registro';
  }

  public function login(Request $request, Response $response)
  {
    try {
      $res = $this->conn->query("
      select * from usuarios 
      where usuario = '{$request->toArray()['usuario']}' && password = '{$request->toArray()['password']}'");
      //print_r($res);
      if ($res->num_rows == 1) {
        $res = $this->conn->query("select
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
        where 
          usuario = '{$request->toArray()['usuario']}' && 
          password = '{$request->toArray()['password']}'");
        if ($res->num_rows == 1) {
          $res = $res->fetch_object();
          session_start();
          $_SESSION["usuario_nombres"] = $res->usuario_nombres;
          $_SESSION["usuario_usuario"] = $res->usuario_usuario;
          $_SESSION["role_id"] = $res->role_id;
          $_SESSION["role_nombre"] = $res->role_nombre;
          $_SESSION["empresa_id"] = $res->empresa_id;
          $_SESSION["empresa_razon_social"] = $res->empresa_razon_social;
          $_SESSION["empresa_ruc"] = $res->empresa_ruc;
          $_SESSION["empresa_direccion"] = $res->empresa_direccion;
          $_SESSION["empresa_ubigeo"] = $res->empresa_ubigeo;
          return $this->resjson([
            'success' => true
          ]);
        }
      } else {
        return $this->resjson(
          [
            'success' => false,
            'errors' => [
              ['message' => 'Hubo un error en los datos.']
            ]
          ]
        );
      }
    } catch (Exception $e) {
      return $this->resjson(['success' => false]);
    }
  }
  public function logout(){
    session_start();
    session_destroy();
    session_unset();
    header("Location: /login");
    exit();
  }
}
