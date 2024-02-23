<?php namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'cliente';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'telefono', 'correo' ]; // no está permitido que se modifiquen columnas que no estén en este arreglo

    protected $useTimestamps    = true;
    protected $createdField       = 'created_at'; // así se nombraron los campos en la base de datos
    protected $updatedField       = 'updated_at';

    protected $validationRules    = [
        'nombre'     => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido'     => 'required|alpha_space|min_length[3]|max_length[75]',
        'telefono'     => 'required|alpha_numeric_space|min_length[8]|max_length[20]',
        'correo'     => 'permit_empty|valid_email|max_length[85]'

    ];
    protected $validationMessages = [
        'correo'        => [
            'valid_email' => 'Estimado usuario, debe ingresar un email valido'
        ]
    ];
    protected $skipValidation     = false;
}