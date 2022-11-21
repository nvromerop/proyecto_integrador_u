@extends('layouts.layouts')

@section('content')


<!-- Bootstrap Table with Header - Dark -->
<div class="card">
    <div class="container">
        <div class="row" style="align-items: center">
            <div class="col-12 col-md-8">
                <h5 class="card-header">Club House</h5>
            </div>
            <div class="col-6 col-md-4">
                <a class="btn btn-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModal">Registro</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table" id='ClubTable'>
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Disponiblidad</th>
                    <th>Usuario</th>
                    <th>Fecha Reserva</th>
                    <th>Hora Reserva</th>
                    <th>Fin Reserva</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @foreach ($clubs as $club)

                <td> {{$club->id_club}} </td>
                <td> {{$club->nombre}} </td>
                <td> {{$club->disponibilidad}} </td>
                <td> {{$club->idUsuario }} </td>
                <td> {{$club->fechaReserva }} </td>
                <td> {{$club->horaReserva }} </td>
                <td> {{$club->finReserva }} </td>
                <td>
                    
                    <form action="{{ route('club.destroy', $club->id_club) }}" method="POST">
                        <button type="button" class='btn btn-info viewdetails' data-id='{{$club->id_club }}'>Show</button>
                        <a class="btn btn-warning" href="{{ route('club.edit',$club->id_club) }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </td>
                </tr>
                @endforeach
            </tbody>
                    </table>
        <div>
            <!-- TO DO: PONER EL PAGINADOR -->
            {{$clubs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<!--/ Bootstrap Table with Header Dark -->

<!-- modal crear -->
<div class="modal fade" id="userCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Registrar Club</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


        </div>
    </div>
</div>
</div>
<!-- fin modal crear -->

<!-- actualizar modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Actualizar {{ $club->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <form method="post" action="{{ route('club.update',$club->id_usu) }}" id="hhhhhh">
                @method('PUT')
                @csrf

            </form>
        </div>
    </div>
</div>
<!-- fin actualizar modal -->


<!-- show modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Visualizar Club {{ $club->nombre}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-body">
                <table class="table table-bordered table table-striped table table-hover" id="tblempinfo">
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- fin show modal -->



@endsection
@section('content-js')
<script>
    let ruta = "{{ route('club.store') }}";
    let ruta2 = "{{ route('club.show',[':clubid']) }}";
</script>
<script src="{{ asset('js/clubs.js') }}"></script>
@endsection