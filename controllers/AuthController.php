<?php

namespace Controllers;

use Config\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 
class AuthController extends Controller
{
    private $db_host = "localhost";  // Change as required
    private $db_user = "root";  // Change as required
    private $db_pass = "moiseslinar3s";  // Change as required
    private $db_name = "invoice";	// Change as required

  public function index()
  {
    return 'registro';
  }

  public function login(Request $request, Response $response){
    $data = $request->toArray();
    return $this->resjson($data);
  }
}