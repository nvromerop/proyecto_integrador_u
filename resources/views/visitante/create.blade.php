@extends('layouts.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Student</h2>
        </div>
        
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('visitante.store') }}" method="POST">
        @csrf
           <!-- HTML5 Inputs -->
           <div class="card mb-4">
                <h5 class="card-header">Registrar Visita</h5>
                <div class="card-body">
                    <div class="row form-group">
                        <label for="fechaIngreso" class="col-2">Fecha De Ingreso:</label>
                        <input type="date" class="form-control col-md-9" id="fechaRegistro" name="fechaRegistro">
                    </div>
                    <div class="row form-group">
                        <label for="horaIngreso" class="col-2">Hora Ingreso:</label>
                        <input type="time" class="form-control col-md-9" id="horaIngreso" name="horaIngreso">
                    </div>
                    <div class="row form-group" >
                        <label for="horaSalida" class="col-2">Hora Salida:</label>
                        <input type="time" class="form-control col-md-9" id="horaSalida" name="horaSalida">
                    </div>
                    <div class="row form-group" >
                        <label for="vehiculo" class="col-2">Vehiculo:</label>
                        <select name="vehiculo" id="vehiculo" class="form-control">
                            <option>Seleccione</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-primary" href="{{ url('visitantes') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <div class="col-xl-12">
    
         
@endsection