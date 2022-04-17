<?php

namespace Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosController {
    public function index(){        
        include './views/documentos/index.php';
    }
}