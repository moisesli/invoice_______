<?php
namespace Controllers;
use Config\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductosController extends Controller {

    public function index(){
        include './views/productos/index.php';
    }

    public function list(){
      $res = $this->conn->query("
        select
          productos.codigo as codigo,
          productsheader.nombre as nombre,
          productos.detalle as detalle,
          productos.precion_sin_igv as precio_sin_igv,
          productos.precio_con_igv as precio_con_igv,
          productos.igv as igv,
          unidades.codigo as ucodigo,
          productsheader.stock as stock
        from productos
             inner join productsheader on productos.productoheader_id = productsheader.id
             inner join unidades on productos.unidad_id = unidades.id
      ")->fetch_all(MYSQLI_ASSOC);

      //print_r(json_encode($res,true));
      return $this->resjson([
        'suceess' => true,
        'items' => $res
      ]);
    }

    public function new(){
      $this->view('productos.new');
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
