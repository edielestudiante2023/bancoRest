<?php namespace App\Models;

use CodeIgniter\Model;

class CuentaModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'cuenta';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['moneda', 'fondo', 'cliente_id' ]; // no está permitido que se modifiquen columnas que no estén en este arreglo

    protected $useTimestamps    = true;
    protected $createdField       = 'created_at'; // así se nombraron los campos en la base de datos
    protected $updatedField       = 'updated_at';

    protected $validationRules    = [
        'moneda'     => 'required|alpha_space|min_length[3]|max_length[5]',
        'fondo'     => 'required|numeric',
        'cliente_id'     => 'required|integer|is_valid_cliente|is_allow_cliente'

        ];
    protected $validationMessages = [
        'cliente_id' => [
            'is_valid_cliente' => 'Estimado usuario, debe ingresar un cliente valido',
            'is_allow_cliente' => 'Estimado usuario, debe ingresar un cliente de la lista permitida'
        ]
        ];


    protected $skipValidation     = false;
}