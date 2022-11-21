<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo";
    protected $primaryKey = "id_placa";
    protected $keyType='string';
    protected $fillable=['id_placa','tipo','marca','modelo', 'color','idUsuario','numParqueadero'];

    public $timestamps = false;
    public function Usuario()
    {
        //belongsto: devuelve a:  parametros M:1 
        //1. Modelo a relacionar
        //2. FK del modelo papa 
        //3. PK del modelo hijo
        return $this->belongsto('App\Usuario', 'idUsuario');
    }
}
