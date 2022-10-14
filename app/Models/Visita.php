<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
     //Vincular modelo atributo
     protected $table="visita";
     //Establecer la PK para la entidad (por defecto: id)
     protected $primaryKey ="id_regvisi";
     //Omitir campos de auditoria
     public $timestamps = false;
}
