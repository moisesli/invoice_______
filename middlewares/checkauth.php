<?php

namespace middlewares;

use Buki\Router\Http\Middleware;
use Exception;
use Symfony\Component\HttpFoundation\Request;

class CheckAuth extends Middleware
{
  public function handle(Request $request)
  {    
      $persmission = array('superadmin', 'admin', 'medio', 'usuario');
      session_start();
      if(isset($_SESSION['role_nombre'])){
        if (in_array($_SESSION['role_nombre'], $persmission)) {
          return true;
        } else {
          return exit;
        }
      }else {
        header("Location: /login");
      }    
  }
}
