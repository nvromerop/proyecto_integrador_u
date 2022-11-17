@extends('layouts.layouts')
 
@section('content')
    
    <!-- Bootstrap Table with Header - Dark -->
    <div class="card">
        <div class="container">
            <div class="row" style="align-items: center">
                <div class="col-12 col-md-8">
                    <h5 class="card-header">Registro Apartamentos</h5>
                </div>
                <div class="col-6 col-md-4">
                    <a class="btn btn-success" href="{{ route('apartamento.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Add</a>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table table-striped table table-hover">
                <thead class="table-dark">
                    <tr>
                    <th>N°</th>
                    <th>Numero Apartamento</th>
                    <th>Numero Torre</th>
                    <th>Estado</th>
                    <th>Residente</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                @php
                    $i = 0;
                @endphp
                <tbody class="table-border-bottom-0">
                    @foreach ($apartamentos as $apartamento)
                    
                    <td> {{ ++$i }}</td>
                    <td> {{$apartamento->numeroApto}} </td>
                    <td> {{$apartamento->numeroTorre}} </td>
                    <td> {{$apartamento->estado }} </td>
                    <td> 
                        @foreach ($usuarios as $usuario)
                            @if($usuario->id_usu == $apartamento->idUsuario)
                                {{$usuario['primerNombre']}} {{$usuario['segundoNombre']}} {{$usuario['primerApellido']}} {{$usuario['segundoApellido']}}
                            @endif
                        @endforeach 
                    </td>
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
                        <form action="{{ route('apartamento.destroy', $apartamento->id_apto) }}" method="POST">
                            <!--<a class="btn btn-info" href="{{ route('apartamento.show',$apartamento->idUsuario) }}" data-bs-toggle="modal" data-bs-target="#viewModal">Show</a>-->
                            <a class="btn btn-primary" href="{{ route('apartamento.edit',$apartamento->id_apto) }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
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
                {{$apartamentos->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->

    <!-- modal crear -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Registrar Apartamentos</h5>
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
                <form action="{{ route('apartamento.store') }}" method="POST" >
                @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="numeroApartamento" class="form-label">Numero Apartamento</label>
                                <input type="number" name="numeroApartamento" id="numeroApartamento" class="form-control" placeholder="Insertar Numero Apartamento" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="numeroTorre" class="form-label">Numero Torre</label>
                                <input type="number" id="numeroTorre" name="numeroTorre" class="form-control" placeholder="Insertar Numero Torre" />
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mb-3">
                             <label for="estado" class="form-label">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option>Seleccione</option>
                                    <option value="Habitado">Habitado</option>
                                    <option value="No Habitado">No Habitado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mb-3">
                                <label for="propietarioApartamento" class="form-label">Propietario Apartamento</label>
                                <select name="propietarioApartamento" id="propietarioApartamento" class="form-control">
                                    <option>Seleccione</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario['id_usu']}}">{{$usuario['tipoDoc']}}{{$usuario['numeroDoc']}} --- {{$usuario['primerNombre']}} {{$usuario['segundoNombre']}} {{$usuario['primerApellido']}} {{$usuario['segundoApellido']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
                    <h5 class="modal-title" id="exampleModalLabel3">Actualizar Apartamento</h5>
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
                <form method="post" action="{{ route('apartamento.update',$apartamento->id_apto) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="numeroApto" class="form-label">Numero Apartamento:</label>
                                <input type="number" name="numeroApto" id="numeroApto" class="form-control" placeholder="Insertar Numero Apartamento" value="{{ $apartamento->numeroApto }} " maxlength="4"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="numeroTorre" class="form-label">Numero Apartamento:</label>
                                <input type="number" name="numeroTorre" id="numeroTorre" class="form-control" placeholder="Insertar Numero Torre" value="{{ $apartamento->numeroTorre }} " maxlength="4"/>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mb-3">
                             <label for="estado" class="form-label">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option>Seleccione</option>
                                    <option value="Habitado">Habitado</option>
                                    <option value="No Habitado">No Habitado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col mb-3">
                                <label for="id_usu" class="form-label">Propietario Apartamento</label>
                                <select name="id_usu" id="id_usu" class="form-control">
                                    <option>Seleccione</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario['id_usu']}}">{{$usuario['primerNombre']}}</option>
                                    @endforeach
                                </select>
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

    <!-- ver modal -->
    
    
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Visualizar Apartamento</h5>
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
                            <table class="table table-bordered table table-striped table table-hover">
                            @foreach ($apartamentos as $apartamento)
                                @if($usuario->id_usu == $apartamento->idUsuario)
                                <tr>
                                    <th>Numero De Apartamento:</th>
                                    <td>{{$apartamento->numeroApto}}</td>
                                </tr>

                                <tr>
                                    <th>Numero De Torre:</th>
                                    <td>{{$apartamento->numeroTorre}}</td>
                                </tr>

                                <tr>
                                    <th>Estado:</th>
                                    <td>{{$apartamento->estado}}</td>
                                </tr>
                                
                                <tr>
                                    
                                    <th>Residente:</th>
                                    @foreach ($usuarios as $usuario)
                                        @if($usuario->id_usu == $apartamento->idUsuario)
                                            <td> {{$usuario['primerNombre']}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @endif
                            @endforeach 
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- fin editar modal -->
@endsection