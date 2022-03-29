<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Clientes extends Model
{
    use HasFactory;
    protected $table = 'clientes';


    protected $filliable = [
        'primer_nombre',
        'primer_apellido',
        'email',
        'id_cliente',
        'llave_secreta',
    ]; //! C27

     
}