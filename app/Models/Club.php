<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //Vvincular modelo a tabla atributo
   protected $table = "clubhouse";
   //establecer la PK para la entidad (por defecto: id)
   protected $primaryKey = "id_club";
   //omitir campos de auditoria
   public $timestamps = false;

   use HasFactory;
   protected $fillable = [
      'nombre', 'disponibilidad', 'idUsuario', 'fechaReserva','horaReserva', 'finReserva'
   ];

   public function Usuario()
   {
       //belongsto: devuelve a:  parametros M:1 
       //1. Modelo a relacionar
       //2. FK del modelo papa 
       //3. PK del modelo hijo
       return $this->belongsto('App\Usuario', 'idUsuario');
   }
}
