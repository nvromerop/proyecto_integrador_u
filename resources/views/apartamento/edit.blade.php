@extends('layouts.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Actualizar Apartamento</h2>
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
    <form method="POST" action="{{ route('apartamento.update',$apartamento->id_apto) }}" >
    @csrf    
    @method('PUT')
        <div class="card mb-4">
            <h5 class="card-header">Datos Apartamento</h5>
            <div class="card-body">
                <div class="row form-group">
                    <label for="numeroApto" class="col-5">Numero Apartamento:</label>
                    <input type="number" class="form-control col-md-9" id="numeroApto" name="numeroApto" value="{{ $apartamento->numeroApto }} " maxlength="4">
                </div>
                <div class="row form-group">
                    <label for="numeroTorre" class="col-2">Numero Torre:</label>
                    <input type="number" class="form-control col-md-9" id="numeroTorre" name="numeroTorre" value="{{ $apartamento->numeroTorre }}" maxlength="2">
                </div>
                <div class="row form-group">
                    <label for="estado" class="col-2">Estado:</label>
                    <input type="option" class="form-control col-md-9" id="estado" name="estado" value="{{ $apartamento->estado }}">
                    <select name="estado" id="estado" class="form-control">
                            <option>Seleccione</option>
                            <option value="Habitado">Habitado</option>
                            <option value="No Habitado">No Habitado</option>
                    </select>
                </div>
                <div class="row form-group" >
                        <label for="id_usu" class="col-4">Propietario Apartamento:</label>
                        <select name="id_usu" id="id_usu" class="form-control">
                            <option>Seleccione</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{$usuario['id_usu']}}">{{$usuario['primerNombre']}}</option>
                            @endforeach
                        </select>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>   
                        <div class="col-6">
                            <a class="btn btn-primary" href="{{ url('apartamentos') }}"> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col-xl-12">
@endsection