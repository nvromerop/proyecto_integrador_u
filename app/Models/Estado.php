<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
     //Vvincular modelo a tabla atributo
     protected $table = "estado";
     //establecer la PK para la entidad (por defecto: id)
     protected $primaryKey = "id_est";
     //omitir campos de auditoria
     public $timestamps = false;
     
     protected $fillable = [
          'tipo'
     ];

     use HasFactory;
}
