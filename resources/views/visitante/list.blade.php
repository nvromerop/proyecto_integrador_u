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
                    <a class="btn btn-success" href="{{ route('visitante.create') }}">Add</a>
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
                            <a class="btn btn-primary" href="{{ route('visitante.edit',$visitante->id_regvisi) }}">Edit</a>
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
@endsection