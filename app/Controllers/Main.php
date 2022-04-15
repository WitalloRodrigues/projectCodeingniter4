<?php namespace App\Controllers;

use App\Libraries\Loja\Venda;
use CodeIgniter\Controller;

class Main extends controller
{

    public function index()
    {
      $db = \Config\Database::connect();
      $resultado = $db->query("SELECT * FROM cliente")->getResultObject();
      
      $db->close();


      echo "<pre>";
      print_r($resultado);

    }

}
