<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   //Vvincular modelo a tabla atributo
   protected $table = "usuario";
   //establecer la PK para la entidad (por defecto: id)
   protected $primaryKey = "id_usu";
   //omitir campos de auditoria
   public $timestamps = false;

   use HasFactory;
   protected $fillable = [
      'primerNombre', 'segundoNombre' ,  'primerApellido' ,'segundoApellido', 'tipoDoc', 'numeroDoc','fechaNacimiento', 'sexo', 'telefono', 'email', 'idEstado', 'idRol'
   ];

   public function Estado()
   {
      //belongsto: devuleve a: parametros M:1
      //1. Modelo a relacionar
      //2. FK del modelo papa 
      //3. PK del modelo hijo
      return $this->belongsto('App\Estado', 'idEstado');
   }

      //Defginir relacion 1:M
      public function Rol()
      {
         //belongsto: devuelve a:  parametros M:1 
         //1. Modelo a relacionar
         //2. FK del modelo papa 
         //3. PK del modelo hijo
         return $this->belongsto('App\Rol', 'idRol');
      }
  
}
