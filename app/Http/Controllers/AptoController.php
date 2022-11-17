<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App;
class AptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartamentos = \App\Models\Apartamento::paginate(5);
        $usuarios = Usuario::all();
        //mostrar una vista con los empleados
        //test 2
        return view('apartamento.list')->with("apartamentos", $apartamentos)->with("usuarios" , $usuarios);


        //return view('apartamento.principal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all();
        /*$data = DB::table('apartamento')
                ->select('primerNombre')
                ->join('usuario','usuario.id_usu','=','apartamento.idUsuario')
                ->get();*/
        return view('apartamento.create')->with("usuarios" , $usuarios);//->with("usuarios" , $data);
        //return view('apartamento.create',compact('usuarios'));
        //return view('apartamento.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numeroApartamento' => 'required|max:3',
            'numeroTorre' => 'required|max:1',
            'estado' => 'required',
            'propietarioApartamento' => 'required',
        ]);

        $apartamento = new Apartamento([
            'numeroApto' => $request->get('numeroApartamento'),
            'numeroTorre'=> $request->get('numeroTorre'),
            'estado' => $request->get('estado'),
            'idUsuario' => $request->get('propietarioApartamento'),
        ]);
        
        $apartamento->save();
        return redirect('/apartamentos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function show($id_apto)
    {
        //$usuarios = Usuario::all();
        //$apartamento = Apartamento::findOrFail($id_apto);
        //return view('apartamento.view')->with("apartamento" , $apartamento)->with("usuarios" , $usuarios);
        //return view('apartamento.view',compact('apartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    //public function edit(Apartamento $apartamento)
    public function edit($id_apto)
    {
        //$usuarios = Usuario::all();
        //return view('apartamento.edit',compact('usuarios'));
        $apartamento = Apartamento::findOrFail($id_apto);
        $usuarios = Usuario::all();
        return view('apartamento.list')->with("apartamento" , $apartamento)->with("usuarios" , $usuarios);


        //$apartamento = Apartamento::findOrFail($id_apto);
        //return view('apartamento.edit',compact('apartamento'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_apto)
    {
        $apartamento = Apartamento::findOrFail($id_apto);
        $apartamento->numeroApto= $request->numeroApto;
        $apartamento->numeroTorre= $request->numeroTorre;
        $apartamento->estado= $request->estado;
        $apartamento->idUsuario= $request->id_usu;
        $apartamento->save();
        return redirect('/apartamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartamento $apartamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartamento $apartamento)
    {
        $apartamento->delete();
        return redirect('/apartamentos')->with('success', 'visitante deleted successfully');
    }
}
