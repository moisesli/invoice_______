<?php

namespace Config;

use PDOException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller
{

    public $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO("mysql:host=localhost;dbname=invoice", "root", "");            
        } catch (PDOException $e) {
            echo "Error al conectarse a la base de datos: " . $e->getMessage();
        }
    }
    public function resjson($data = [], $status = 200, array $headers = [], $options = 0){
        header("HTTP/1.1");
        header("Content-Type:application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }

    public function creating($table, array $data)
    {
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $sth = $this->db->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        return $sth->execute();
    }

    public function editing($id){
        $consult = $this->db->prepare("select * from categorias where id=$id");
        $consult->execute();
        $consult = $consult->fetch(\PDO::FETCH_ASSOC);
        return $consult;
    }

    public function updating($table, array $data, $id)
    {

        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }

        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->db->prepare("UPDATE {$table} SET $fieldDetails WHERE id={$id}");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        return $sth->execute();

        //return $fieldDetails;
    }


    public function pagination($sql, $pagina, $perPage){
        $palabraBuscada  = '';
        $resultado = [];
        $inicio = ($pagina >= 1) ? (($pagina * $perPage) - $perPage) : 0;

        $registros = $this->db->prepare("$sql LIMIT $inicio,$perPage");
        $registros->execute();
        $registros = $registros->fetchAll(\PDO::FETCH_OBJ);

        $totalregistros = $this->db->query("SELECT FOUND_ROWS() as total");
        $totalregistros = (float)$totalregistros->fetch()['total'];

        $numeropaginas = ceil($totalregistros / $perPage);

        $resultado["registros"] = $registros;
        $resultado["inicio"] = $inicio +1 ;
        if($totalregistros < $perPage){
            $resultado["fin"] = $inicio + $totalregistros;
        }
        else{
            $resultado["fin"] = $inicio + $perPage;
        }
        $resultado["totalregistros"] = $totalregistros;
        $resultado["pagina"] = intval($pagina);

        if($pagina >= $numeropaginas){
            $resultado["pagina_anterior"] = $pagina - 1;
            $resultado["pagina_posterior"] = 0;
        } elseif(0 < $pagina && $pagina <= $numeropaginas){
            $resultado["pagina_anterior"] = $pagina -1;
            $resultado["pagina_posterior"] = $pagina + 1;
        }
        $resultado["palabra_buscada"] = $palabraBuscada;

        return $resultado;
    }

    public function deleting($id){
        $consult = $this->db->prepare("delete from categorias where id=$id");
        return $consult->execute();
    }
}
