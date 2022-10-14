<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //Vincular modelo atributo
    protected $table="vehiculo";
    //Establecer la PK para la entidad (por defecto: id)
    protected $primaryKey ="id_placa";
    //Omitir campos de auditoria
    public $timestamps = false;
}
