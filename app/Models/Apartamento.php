<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    //Vincular modelo atributo
    protected $table = "apartamento";
    //Establecer la PK para la entidad (por defecto: id)
    protected $primaryKey = "id_apto";
    //Omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'numeroApto', 'numeroTorre', 'estado', 'idUsuario'
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
