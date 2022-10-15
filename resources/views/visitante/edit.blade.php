@extends('layouts.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update visitante</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('visitante') }}"> Back</a>
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
    <form method="post" action="{{ route('visitante.update',$visitante->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="fechaIngreso">Fecha Registro:</label>
            <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" value="{{ $visitante->fechaIngreso }}">
        </div>
        <div class="form-group">
            <label for="horaIngreso">Hora Ingreso:</label>
            <input type="time" class="form-control" id="horaIngreso" name="horaIngreso" value="{{ $visitante->horaIngreso }}">
        </div>
        <div class="form-group">
            <label for="horaSalida">Hora Salida:</label>
            <input ype="time" class="form-control" id="horaSalida" name="horaSalida" value="{{ $visitante->horaSalida }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection