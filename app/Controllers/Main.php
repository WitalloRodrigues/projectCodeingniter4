<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Main extends controller
{
    public function index()
    {
      $data['frase'] = "esta é a frase do controlador";
      echo view('templates/html_header',$data);
      echo view('pagina1');
      echo view('templates/html_footer');
    }
}
