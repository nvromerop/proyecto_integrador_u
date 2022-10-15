@extends('visitante.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Registrar Visita</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('visitantes') }}"> Back</a>
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
        <div class="card-body">
            <div class="row form-group">
                <label for="fechaIngreso" class="col-2">Fecha De Ingreso:</label>
                <input type="date" class="form-control col-md-9" id="fechaIngreso"  name="fechaIngreso">
            </div>
            <div class="row form-group">
                <label for="horaIngreso" class="col-2">Hora Ingreso:</label>
                <input type="time" class="form-control col-md-9" id="horaIngreso"  name="horaIngreso">
            </div>
            <div class="row form-group" >
                <label for="horaSalida" class="col-2">Hora Salida:</label>
                <input type="time" class="form-control col-md-9" id="horaSalida" name="horaSalida">
            </div>
            <div class="row form-group" >
                <label for="vehiculo" class="col-2">Vehiculo:</label>
                <select name="vehiculo" id="vehiculo"  class="form-control" aria-label="Default select example">
                    <option selected>Seleccione</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        
    </form>
@endsection