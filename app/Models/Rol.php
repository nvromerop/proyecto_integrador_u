<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
     //Vvincular modelo a tabla atributo
     protected $table="rol";
     //establecer la PK para la entidad (por defecto: id)
     protected $primaryKey ="id_rol";
     //omitir campos de auditoria
     public $timestamps = false;

}
