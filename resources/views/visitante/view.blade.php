@extends('layouts.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Laravel 7 CRUD Example</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('visitantes') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Fecha Registro:</th>
            <td>{{$visitante->fechaRegistro}}</td>
        </tr>
        <tr>
            <th>Hora de ingreso:</th>
            <td>{{$visitante->horaIngreso}}</td>
        </tr>
        <tr>
            <th>Hora de salida:</th>
            <td>{{$visitante->horaSalida}}</td>
        </tr>
 
    </table>
@endsection