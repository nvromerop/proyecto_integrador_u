@extends('layouts.layouts')
 
@section('content')
    
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
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th>N°</th>
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
                                <input type="time" id="horaSalida" name="horaSalida" class="form-control" placeholder="" />
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
@endsection