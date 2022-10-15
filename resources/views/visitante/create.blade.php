@extends('visitante.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Student</h2>
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
                <input type="date" class="form-control col-md-9" id="fechaIngreso" placeholder="Enter First Name" name="fechaIngreso">
            </div>
            <div class="row form-group">
                <label for="horaIngreso" class="col-2">Last Name:</label>
                <input type="datetime" class="form-control col-md-9" id="horaIngreso" placeholder="Enter Last Name" name="horaIngreso">
            </div>
            <div class="row form-group" >
                <label for="horaSalida" class="col-2">Address:</label>
                <input type="datetime" class="form-control col-md-9" id="horaSalida" placeholder="Enter Last Name" name="horaSalida">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        
    </form>
@endsection