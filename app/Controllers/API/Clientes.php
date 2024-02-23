<?php

namespace App\Controllers\API;

//Este es el primer controlador basado en ResourceController; ver archivo Routes.php

use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController; //al no heredar de BaseController, sino de ResourceController ->esta es una clase especial de codeigniter para Restful API

class Clientes extends ResourceController
{
    public function __construct()
    {
        $this->model = $this->setModel(new ClienteModel());
    }
    public function index()
    {
        $cliente = $this->model->findAll(); //Obtener todos los registros de la tabla clientes
        return $this->respond($cliente);
    }

    public function create()
    {
        try {
            $cliente = $this->request->getJSON();
            if ($this->model->insert($cliente)):
                return $this->respondCreated();
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError ('Ha ocurrido un error en el servidor');
        }
    }
}
