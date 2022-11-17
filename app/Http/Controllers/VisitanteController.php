<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use App\Models\Visita;
use App\Models\Apartamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Exception;
use Illuminate\Database\QueryException;


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
        $visitantes = \App\Models\Visitante::paginate(5);
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
        $validacion = $request->validate([
            'fechaRegistro' => 'required',
            'horaIngreso' => 'required',
            'primerNom' => 'required',
            'primerApe' => 'required',
            'tipoDoc' => 'required',
            'identidad' => 'required',
            'vehiculo' => 'required',
            'apartamento' => 'required|max:3',
        ]);

        if (isset($request->validate) && $request->validate->fails()) {
            return json_encode($validacion);
        }

        // $test = DB::table('apartamento')->where('numeroApto', '=', '204')->first();
        // $test = DB::select("SELECT id_apto FROM apartamento WHERE numeroApto = '204'");
        // $test  = Apartamento::where('numeroApto', '204')->first();
        DB::beginTransaction();
        try {

            $numApart = $request->get('apartamento');
            $idApart = DB::table('apartamento')->where('numeroApto', '=', $numApart)->value('id_apto');

            $identifi = $request->get('identidad');
            $validar_visi = DB::table('visitante')->where('numeroDoc', '=', $identifi)->count();
            if ($validar_visi >= 1) {
                $idingresado = DB::table('visitante')->where('numeroDoc', '=', $identifi)->value('id_visi');
            } else {
                $visita = new Visita([
                    'primerNombre' => $request->get('primerNom'),
                    'segundoNombre' => $request->get('segNombre'),
                    'primerApellido' => $request->get('primerApe'),
                    'segundoApellido' => $request->get('segApe'),
                    'tipoDoc' => $request->get('tipoDoc'),
                    'numeroDoc' => $request->get('identidad')
                ]);
                $visita->save();
                $idingresado = $visita->id_visi;
            }



            $visitante = new Visitante([
                'fechaRegistro' => $request->get('fechaRegistro'),
                'horaIngreso' => $request->get('horaIngreso'),
                'horaSalida' => $request->get('horaSalida'),
                'vehiculo' => $request->get('vehiculo'),
                'idVisitante' => $idingresado,
                'idApto' => $idApart,
                'idPlaca' => $request->get('placa')


            ]);
            $visitante->save();
            $idVisita = $visitante->id_regvisi;
            DB::commit();
            if ($idVisita != NULL) {
                return json_encode(['success' => '1']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return json_encode(['error' => $message]);
            // var_dump('Exception Message: '. $message);

            // $code = $e->getCode();       
            // var_dump('Exception Code: '. $code);

            // $string = $e->__toString();       
            // var_dump('Exception String: '. $string);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function show(Visitante $visitante)
    {
        //Consulta de la tabla 
        $visitantes = DB::table('visita as v')
            ->leftJoin('visitante as vs', 'v.idVisitante', '=', 'vs.id_visi')
            ->where('v.id_regvisi', '=', $visitante->id_regvisi)
            ->select('*')->get();



        /*

            $visitantes = DB::table('visita as v')
            ->join('visitante as vs', 'v.idVisitante', '=', 'vs.id_visi')
            ->join('vehiculo as veh', 'v.idPlaca', '=', 'veh.idPlaca')
            ->where('v.id_regvisi', '=', $visitante->id_regvisi)
            ->select('*')->get();*/
            
        $visitantes2 = response()->json($visitantes);

        // die(var_dump($usuario->id_usu));
        // $users = Usuario::find($usuario->id_usu)->first();
        // $visitantes = Visitante::where('id_visi', $visitante->id_regvisi)->get();
        // var_dump($visitantes);
        // die($visitantes[0]->fechaRegistro);

        // 'fechaRegistro','horaIngreso', 'horaSalida', 'vehiculo'
        $html = "";
        if (!empty($visitantes)) {
            $html = "
                <tr>
                    <th>Fecha Registro:</th>
                    <td>" . $visitantes[0]->fechaRegistro . "</td>
                </tr>
                <tr>
                    <th>Hora Ingreso:</th>
                    <td>" . $visitantes[0]->horaIngreso . "</td>
                </tr>
                <tr>
                    <th>Hora Salida:</th>
                    <td>" . $visitantes[0]->horaSalida . "</td>
                </tr>
                <tr>
                    <th>Vehiculo:</th>
                    <td>" . $visitantes[0]->idPlaca . "</td>
                </tr>
                <tr>
                    <th>Primer Nombre Visitante:</th>
                    <td>" . $visitantes[0]->primerNombre . "</td>
                </tr>
                <tr>
                    <th>Segundo Nombre Visitante:</th>
                    <td>" . $visitantes[0]->segundoNombre . "</td>
                </tr>
                <tr>
                    <th>Primer Apellido Visitante:</th>
                    <td>" . $visitantes[0]->primerApellido . "</td>
                </tr>
                <tr>
                    <th>Segundo Apellido Visitante:</th>
                    <td>" . $visitantes[0]->segundoApellido . "</td>
                </tr>
                <tr>
                    <th>Tipo Documento:</th>
                    <td>" . $visitantes[0]->tipoDoc . "</td>
                </tr>
                <tr>
                    <th>Número Documento:</th>
                    <td>" . $visitantes[0]->numeroDoc . "</td>
                </tr>
           ";
        }
        $response['html'] = $html;

        return response()->json($response);
        // return view('usuario.view', compact('usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitante $visitante)
    {
        // return view('visitante.edit',compact('visitante'));
        //$visita = Visitante::where('id_regvisi',$visitante)->get();
        //  $visita = Visitante::find($visitante)->first();
        //  $visitanteR = Visita::find(15)->first();
        $visita = DB::table('visita as v')
            ->leftJoin('visitante as vs', 'v.idVisitante', '=', 'vs.id_visi')
            ->leftJoin('apartamento as ap', 'v.idApto', '=', 'ap.id_apto')
            ->where('v.id_regvisi', '=', $visitante->id_regvisi)
            ->select('*')->get();

        //  die($visita);
        //  $visitantes = Visitante::find($visitante)->visitantesR;
        return response()->json($visita);
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
        $visitante_id = $request->cid;
        
        $validacion = $request->validate([
            'horaSalidaUpdate'=>'required',
            
        ]);

        if (isset($request->validate) && $request->validate->fails()) {
            return json_encode($validacion);
        }

        DB::beginTransaction();
        try{
  
            $visitante = Visitante::find($visitante_id);
            $visitante->horaSalida = $request->get('horaSalidaUpdate');
            $query = $visitante->update();
            
            DB::commit();
            // if($idVisita != NULL){
            //     return json_encode(['success'=>'1']);
            // }
    
            if($query){
                return json_encode(['success'=>1]);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            $message = $e->getMessage();
            return json_encode(['error'=>$message]);
        };
        // return redirect('/visitantes')->with('success', 'visitante updated successfully');
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
