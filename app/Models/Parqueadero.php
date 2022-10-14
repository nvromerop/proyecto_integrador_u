<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parqueadero extends Model
{
    //Vincular modelo atributo
    protected $table="parqueadero";
    //Establecer la PK para la entidad (por defecto: id)
    protected $primaryKey ="id_parq";
    //Omitir campos de auditoria
    public $timestamps = false;
}
