@extends('layouts.layouts')

@section('content')
<<<<<<< HEAD

<!-- Bootstrap Table with Header - Dark -->
<div class="card">
    <div class="container">
        <div class="row" style="align-items: center">
            <div class="col-12 col-md-8">
                <h5 class="card-header">Registro Visitantes</h5>
            </div>
            <div class="col-6 col-md-4">
                <a class="btn btn-success" href="{{ route('visitante.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Add</a>
=======
    
    <!-- Bootstrap Table with Header - Dark -->
    <div class="card">
        <div class="container">
            <div class="row" style="align-items: center">
                <div class="col-12 col-md-8">
                    <h5 class="card-header">Registro Visitantes</h5>
                </div>
                <div class="col-6 col-md-4">
                    <a class="btn btn-success" href="{{ route('visitante.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Add</a>
                </div>
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table" id='VisitanteTable'>
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>N° Apartamento</th>
                    <th>Fecha Ingreso</th>
                    <th>Hora Ingreso</th>
                    <th>Hora Salida</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @php
            $i = 0;
            @endphp
            <tbody class="table-border-bottom-0">
                @foreach ($visitantes as $visitante)

                <td> {{ ++$i }}</td>
                <td> {{$visitante->primerNombre}}  {{$visitante->primerApellido}} </td>
                <td> {{$visitante->numeroApto}}  </td>
                <td> {{$visitante->fechaRegistro}} </td>
                <td> {{$visitante->horaIngreso}} </td>
                <td> {{$visitante->horaSalida }} </td>
                <td>
                    <!-- <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div> -->
<<<<<<< HEAD

                    <form action="{{ route('visitante.destroy', $visitante->id_regvisi) }}" method="POST">
                        <button type="button" class='btn btn-info viewdetails' data-id='{{$visitante->id_regvisi }}'>Show</button>
                        <button type="button" class="btn btn-warning btn-detail open_modal" value="{{$visitante->id_regvisi}}">Edit</button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div>
            <!-- TO DO: PONER EL PAGINADOR -->
            {{$visitantes->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<!--/ Bootstrap Table with Header Dark -->

<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">

<!-- modal crear -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Registrar Visitante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-danger d-none" id="errors-modal" >
                    <strong>Campos Obligatorios!</strong> Validar los siguientes Campos.<br>
                    <ul id="ul-errors">
                    </ul>
                </div>
                
                <form action="" id="VisitForm">
                        @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="primerNom" class="form-label">Primer Nombre</label>
                                <input type="text" name="primerNom" id="primerNom" class="form-control" placeholder="Primer Nombre" required/>
                            </div>
                            <div class="col mb-3">
                                <label for="segNombre" class="form-label">Segundo Nombre</label>
                                <input type="text" name="segNombre" id="segNombre" class="form-control noFilt" placeholder="Insertar Nombre" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="primerApe" class="form-label">Primer Apellido</label>
                                <input type="text" name="primerApe" id="primerApe" class="form-control" placeholder="Insertar Nombre" required/>
                            </div>
                            <div class="col mb-3">
                                <label for="segApe" class="form-label">Segundo Apellido</label>
                                <input type="text" name="segApe" id="segApe" class="form-control noFilt" placeholder="Insertar Nombre" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="tipoDoc" class="form-label">Tipo Documento</label>
                                <select class="form-control" id="tipoDoc" name="tipoDoc" aria-label="Seleccione Tipo de Documento">
                                <option value="">Seleccione</option>
                                <option value="TI">TI</option>
                                <option value="CC">CC</option>
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="identidad" class="form-label">N° Identidad</label>
                                <input type="text" id="identidad" name="identidad" class="form-control" placeholder="N° Identidad" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="apartamento" class="form-label">Apartamento</label>
                                <input type="number" id="apartamento" name="apartamento" class="form-control" placeholder="#" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="fechaIngreso" class="form-label">Fecha De Ingreso</label>
                                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" placeholder="DD / MM / YY" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="horaIngreso" class="form-label">Hora Ingreso</label>
                                <input type="time" id="horaIngreso" name="horaIngreso" class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                                <label for="horaSalida" class="form-label">Hora Salida</label>
                                <input type="time" id="horaSalida" name="horaSalida" class="form-control noFilt" placeholder="" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0" id="contenedor1">
                                <label for="vehiculo" class="form-label">Vehiculo:</label>
                                <select name="vehiculo" id="vehiculo" class="form-control" onchange="activarVehiculo(this.value)">
                                    <option value="">Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col mb-0 d-none" id="contenedor2">
                                <label for="placa" class="form-label">N° de Placa</label>
                                <input type="text" id="placa" name="placa" class="form-control" placeholder="N° de Placa" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="button" class="btn btn-success" id="btnAdd">Guardar</button>
                    </div>
                    {{-- <div class="modal-footer"><a data-dismiss="modal" class="btn btn-primary" id="btnAdd">Confirm</a></div>  --}}

                </form>
            </div>
        </div>
    </div>
    <!-- fin modal crear -->

 <!-- editar modal -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Actualizar Visitante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="alert alert-danger d-none" id="errors-modal-update" >
                    <strong>Campos Obligatorios!</strong> Validar los siguientes Campos.<br>
                    <ul id="ul-errors-update">
                    </ul>
                </div>
                <form  method="post" action="{{ route('visitante.update') }}" id="update-visita-form">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="cid" id="id_editar">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="primerNom" class="form-label">Primer Nombre</label>
                                <input type="text" name="primerNom" id="primerNomUpdate" class="form-control" value="" readonly/>
                            </div>
                            <div class="col mb-3">
                                <label for="segNombre" class="form-label">Segundo Nombre</label>
                                <input type="text" name="segNombre" id="segNombreUpdate" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="primerApe" class="form-label">Primer Apellido</label>
                                <input type="text" name="primerApe" id="primerApeUpdate" class="form-control" readonly/>
                            </div>
                            <div class="col mb-3">
                                <label for="segApe" class="form-label">Segundo Apellido</label>
                                <input type="text" name="segApe" id="segApeUpdate" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="tipoDoc" class="form-label">Tipo Documento</label>
                                <select class="form-select" id="tipoDocUpdate" name="tipoDoc" disabled="true">
=======
                        <form action="{{ route('visitante.destroy', $visitante->id_regvisi) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('visitante.show',$visitante->id_regvisi) }}">Show</a>
                            <!-- <a class="btn btn-primary" href="{{ route('visitante.edit',$visitante->id_regvisi) }}">Edit</a> -->
                            <a class="btn btn-primary" href="{{ route('visitante.edit',$visitante->id_regvisi) }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div>
                <!-- TO DO: PONER EL PAGINADOR -->
                {{$visitantes->links() }}
            </div>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->
    <!-- modal crear -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Registrar Visitante</h5>
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
                <form action="{{ route('visitante.store') }}" method="POST">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col mb-3">
                            <label for="nombreVisitante" class="form-label">Nombre Visitante</label>
                            <input type="text" name="nombreVisitante" id="nombreVisitante" class="form-control" placeholder="Insertar Nombre" />
                        </div>
                        </div>
                        <div class="row g-2">
                            <!-- <div class="col mb-0">
                                <label for="tipoDoc" class="form-label">Email</label>
                                <input type="text" id="tipoDoc" name="tipoDoc" class="form-control" placeholder="xxxx@xxx.xx" />
                            </div> -->
                            <div class="col mb-0">
                                <label for="tipoDoc" class="form-label">Tipo Documento</label>
                                <select class="form-select" id="tipoDoc" name="tipoDoc" aria-label="Seleccione Tipo de Documento">
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                                <option selected>Seleccione</option>
                                <option value="TI">TI</option>
                                <option value="CC">CC</option>
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="identidad" class="form-label">N° Identidad</label>
<<<<<<< HEAD
                                <input type="text" id="identidadUpdate" name="identidad" class="form-control" readonly />
=======
                                <input type="text" id="identidad" name="identidad" class="form-control" placeholder="N° Identidad" />
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
<<<<<<< HEAD
                                <label for="apartamento" class="form-label">Apartamento</label>
                                <input type="number" id="apartamentoUpdate" name="apartamento" class="form-control" readonly/>
=======
                                <label for="apartamento" class="form-label">Fecha De Ingreso</label>
                                <input type="number" id="apartamento" name="apartamento" class="form-control" placeholder="#" />
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="fechaIngreso" class="form-label">Fecha De Ingreso</label>
<<<<<<< HEAD
                                <input type="date" id="fechaRegistroUpdate" name="fechaRegistro" class="form-control" value="" readonly />
=======
                                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" placeholder="DD / MM / YY" />
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="horaIngreso" class="form-label">Hora Ingreso</label>
<<<<<<< HEAD
                                <input type="time" id="horaIngresoUpdate" name="horaIngreso" class="form-control" value="" readonly/>
                            </div>
                            <div class="col mb-0">
                                <label for="horaSalida" class="form-label">Hora Salida</label>
                                <input type="time" id="horaSalidaUpdate" name="horaSalidaUpdate" class="form-control valid-inp" value="" />
=======
                                <input type="time" id="horaIngreso" name="horaIngreso" class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                                <label for="horaSalida" class="form-label">Hora Salida</label>
                                <input type="time" id="horaSalida" name="horaSalida" class="form-control" placeholder="" />
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0" id="contenedor1">
                                <label for="vehiculo" class="form-label">Vehiculo:</label>
<<<<<<< HEAD
                                <select name="vehiculo" id="vehiculoUpdate" class="form-select" disabled="true">
=======
                                <select name="vehiculo" id="vehiculo" class="form-select" onchange="activarVehiculo(this.value)">
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                                    <option>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
<<<<<<< HEAD
                            <div class="col mb-0" id="contenedor2">
                                <label for="placa" class="form-label">N° de Placa</label>
                                <input type="text" id="placaUpdate" name="placa" class="form-control" value="" readonly/>
=======
                            <div class="col mb-0 d-none" id="contenedor2">
                                <label for="placa" class="form-label">N° de Placa</label>
                                <input type="text" id="placa" name="placa" class="form-control" placeholder="N° de Placa" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- fin modal crear -->
    <!-- editar modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Actualizar Visitante</h5>
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
                <form method="post" action="{{ route('visitante.update',$visitante->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="col mb-3">
                            <label for="nombreVisitante" class="form-label">Nombre Visitante</label>
                            <input type="text" name="nombreVisitante" id="nombreVisitante" class="form-control" placeholder="Insertar Nombre" />
                        </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="tipoDoc" class="form-label">Tipo Documento</label>
                                <select class="form-select" id="tipoDoc" name="tipoDoc" aria-label="Seleccione Tipo de Documento">
                                <option selected>Seleccione</option>
                                <option value="TI">TI</option>
                                <option value="CC">CC</option>
                                </select>
                            </div>
                            <div class="col mb-0">
                                <label for="identidad" class="form-label">N° Identidad</label>
                                <input type="text" id="identidad" name="identidad" class="form-control" placeholder="N° Identidad" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="apartamento" class="form-label">Fecha De Ingreso</label>
                                <input type="number" id="apartamento" name="apartamento" class="form-control" placeholder="#" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="fechaIngreso" class="form-label">Fecha De Ingreso</label>
                                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" value="{{ $visitante->fechaIngreso }}" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="horaIngreso" class="form-label">Hora Ingreso</label>
                                <input type="time" id="horaIngreso" name="horaIngreso" class="form-control" value="{{ $visitante->horaIngreso }}"/>
                            </div>
                            <div class="col mb-0">
                                <label for="horaSalida" class="form-label">Hora Salida</label>
                                <input type="time" id="horaSalida" name="horaSalida" class="form-control" value="{{ $visitante->horaSalida }}" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0" id="contenedor1">
                                <label for="vehiculo" class="form-label">Vehiculo:</label>
                                <select name="vehiculo" id="vehiculo" class="form-select" onchange="activarVehiculo(this.value)">
                                    <option>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col mb-0 d-none" id="contenedor2">
                                <label for="placa" class="form-label">N° de Placa</label>
                                <input type="text" id="placa" name="placa" class="form-control" placeholder="N° de Placa" />
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- fin editar modal -->
<<<<<<< HEAD

<!-- show modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel3">Visualizar Visitante {{ $visitante->fechaReserva }}</h5> --}}
                <h5 class="modal-title" id="exampleModalLabel3">Visualizar Visitante</h5>
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
    let ruta = "{{ route('visitante.store') }}";
    let ruta2 = "{{ route('visitante.show',[':visitanteid']) }}";
</script>
<script src="{{ asset('js/visitantes.js') }}"></script>

{{-- vendors --}}
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
=======
    <script>
        function activarVehiculo(valor) {
            var activarCampos = 1;
            var camp;

            if (valor == activarCampos) {
                $('#contenedor2').removeClass('d-none');
            }else{
                $('#contenedor2').addClass('d-none');
            }
        }
    </script>
<!-- <script src="../visitante/visitantes.js"></script> -->
>>>>>>> f476751ed8e4fba6c6b76e148dfe38d8f44892fa
@endsection