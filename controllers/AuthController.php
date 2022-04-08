<?php

namespace Controllers;

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
    $data = $request->toArray();
    return $this->resjson($data);
  }
}