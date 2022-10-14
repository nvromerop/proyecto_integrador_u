@extends('visitante.layouts')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Visitantes</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('visitante.create') }}">Add</a>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Fecha Ingreso</th>
            <th>Hora Ingreso</th>
            <th>Hora Salida</th>
            <th width="280px">Action</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($visitantes as $visitante)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$visitante->fechaRegistro}}</td>
                <td>{{$visitante->horaIngreso}}</td>
                <td>{{$visitante->horaSalida }}</td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-info" href="">Show</a>
                        <a class="btn btn-primary" href="">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection