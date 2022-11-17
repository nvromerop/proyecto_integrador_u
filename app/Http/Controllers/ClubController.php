<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Usuario;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response FK_Usuario_idRolFK
     */
    public function index()
    {
        $clubs = \App\Models\Club::paginate(5);
        //mostrar una vista con los empleados
        //test 2
        return view('club.list')->with("clubs", $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Http\Requests\UserStoreRequest $request)
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Club $club)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        $clubs = Club::where('id_club',$club->id_club)->get();

        // 'nombre', 'disponibilidad', 'idUsuario', 'fechaReserva','horaReserva', 'finReserva'
        $html = "";
        if (!empty($clubs)) {
            $html = "
                <tr>
                    <th>Nombre:</th>
                    <td>" . $clubs[0]['nombre'] . "</td>
                </tr>
                <tr>
                    <th>Disponibilidad:</th>
                    <td>" . $clubs[0]['disponibilidad'] . "</td>
                </tr>
                <tr>
                    <th>Usuario:</th>
                    <td>" . $clubs[0]['idUsuario'] . "</td>
                </tr>
                <tr>
                    <th>Fecha Reserva:</th>
                    <td>" . $clubs[0]['fechaReserva'] . "</td>
                </tr>
                <tr>
                    <th>Hora Reserva:</th>
                    <td>" . $clubs[0]['horaReserva'] . "</td>
                </tr>
                <tr>
                    <th>Fin Reserva:</th>
                    <td>" . $clubs[0]['finReserva'] . "</td>
                </tr>
            
           ";
        }
        $response['html'] = $html;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario, $id_usu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
  
}
