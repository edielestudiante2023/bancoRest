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
                $cliente->id = $this->model->insertID();
                return $this->respondCreated();
        else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError ('Ha ocurrido un error en el servidor');
        }
    }

    public function edit($id = null)
    {
        try {
            if($id == null) 
            return $this->failValidationErrors('No se ha pasado un ID valido');
            $cliente = $this->model->find($id);
            if($cliente == null) 
            return $this->failNotFound('No se ha encontrado al cliente con id '.$id);            
            return $this->respond($cliente);
        } catch (\Exception $e) {
            return $this->failServerError ('Ha ocurrido un error en el servidor');
        }
    }
    public function update($id = null)
    {
        try {
            if($id == null) 
            return $this->failValidationErrors('No se ha pasado un ID valido');
            $clienteVerificado = $this->model->find($id);
            if($clienteVerificado == null) 
            return $this->failNotFound('No se ha encontrado al cliente con id '.$id);            
            
            $cliente = $this->request->getJSON();
            if ($this->model->update($id, $cliente)):
                $cliente->id = $id;
                return $this->respondUpdated($cliente);
        else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError ('Ha ocurrido un error en el servidor');
        }
    }
    public function delete($id = null)
    {
        try {
            if($id == null) 
            return $this->failValidationErrors('No se ha pasado un ID valido');
            
            $clienteVerificado = $this->model->find($id);
            if($clienteVerificado == null) 
            return $this->failNotFound('No se ha encontrado al cliente con id '.$id);            
            
            if ($this->model->delete($id)):
                
                return $this->respondDeleted($clienteVerificado);
        
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError ('Ha ocurrido un error en el servidor');
        }
    }
}
