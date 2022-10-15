<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
     //vvincular modelo atributo
    protected $table="visita";
    //establecer la PK para la entidad (por defecto: id)
    protected $primaryKey ="id_regvisi";

    //omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'fechaRegistro','horaIngreso', 'horaSalida'
    ];
 
}
