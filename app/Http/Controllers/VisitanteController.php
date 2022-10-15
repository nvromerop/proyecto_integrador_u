<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $visitantes = Visitante::all();
        // return view('visitante.list', compact('visitantes',$visitantes));
        $visitantes = \App\Models\Visitante::paginate(2);
       //mostrar una vista con los empleados
       //test 2
       return view('visitante.list')->with("visitantes", $visitantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaRegistro'=>'required',
            'horaIngreso'=> 'required'
            // 'txtAddress' => 'required'
        ]);
 
        $visitante = new Visitante([
            'fechaRegistro' => $request->get('fechaRegistro'),
            'horaIngreso'=> $request->get('horaIngreso'),
            'horaSalida'=> $request->get('horaSalida'),
            'vehiculo'=> $request->get('vehiculo')
        ]);
 
        $visitante->save();
        return redirect('/visitantes')->with('success', 'Student has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function show(Visitante $visitante)
    {
        return view('visitante.view',compact('visitante'));
        // return view('visitante.view')->with("visitante", $visitante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitante $visitante)
    {
        return view('visitante.edit',compact('visitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitante $visitante)
    {
        $request->validate([
            'fechaRegistro'=>'required',
            'horaIngreso'=> 'required'
            // 'txtAddress' => 'required'

        ]);
 
 
        $visitante = Visitante::find($visitante);
        $visitante->fechaRegistro = $request->get('fechaRegistro');
        $visitante->horaIngreso = $request->get('horaIngreso');
        $visitante->horaSalida = $request->get('horaSalida');
 
        $visitante->update();
 
        return redirect('/visitantes')->with('success', 'visitante updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitante $visitante)
    {
        $visitante->delete();
        return redirect('/visitantes')->with('success', 'visitante deleted successfully');
    }
}
