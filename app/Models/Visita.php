<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
     //Vincular modelo atributo
     protected $table="visitante";
     //Establecer la PK para la entidad (por defecto: id)
     protected $primaryKey ="id_visi";
     //Omitir campos de auditoria
     public $timestamps = false;

     use HasFactory;
     protected $fillable = [
          'primerNombre','segundoNombre', 'primerApellido', 'segundoApellido', 'tipoDoc', 'numeroDoc'
     ];
}
