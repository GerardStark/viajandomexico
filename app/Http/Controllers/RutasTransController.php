<?php

namespace App\Http\Controllers;

use App\Servicio_Transporte;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Galeria;
use App\Ruta;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Transporte;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class RutasTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
        ]);
    }


    public function index($id)
    {
        $transporte = Transporte::where('id',$id)->get()->first();
        $rutas = Ruta::where('id_transporte', '=' ,$id)->get();

        return view('providers.transportes.rutas.index', compact('transporte', 'rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){

        $servicios = DB::table('servtrans')->orderBy('nombre')->get();
        $transporte = Transporte::where('id','=',$id)->get()->first();
        return view('providers.transportes.rutas.create',compact('transporte','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $ruta = new Ruta();
        $ruta->id_transporte = $request->input('id_transporte');
        $ruta->nombre = $request->input('nombre_ruta');
        $ruta->descripcion = $request->input('descripcion');
        $ruta->duracion = $request->input('duracion');
        $ruta->horario_apertura = $request->input('horario_inicio');
        $ruta->horario_cierre = $request->input('horario_finaliza');
        $ruta->precio_standard = $request->input('precio_standard');
        $ruta->serv_cargo = $request->input('servicios_cargo');
        $ruta->serv_libres = $request->input('servicios_sin');
        $ruta->vehiculo_descripcion = $request->input('descripcion_vehiculo');
        $ruta->vehiculo_capacidad = $request->input('tipo_vehiculo');
        $ruta->vehiculo_tipo = $request->input('capacidad');
        $ruta->save();
        $servicios = $request->input('servicios');
        $idruta = $ruta->id;
        $transporte = $request->input('id_transporte');
        $this->storestuff($idruta);
        $this->saveservicios($idruta, $servicios);

        return redirect()->route('rutastransport',[$transporte]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $ruta = Ruta::where('id',$id)->get()->first();
        $servicios = Servicio_Transporte::where('id_ruta',$id)->orderBy('id_servicio')->get();
        return view('providers.transportes.rutas.edit', compact('ruta','vehiculo','servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $ruta = Ruta::find($id);
        $ruta->nombre = $request->input('nombre_ruta');
        $ruta->descripcion = $request->input('descripcion');
        $ruta->duracion = $request->input('duracion');
        $ruta->horario_apertura = $request->input('horario_inicio');
        $ruta->horario_cierre = $request->input('horario_finaliza');
        $ruta->precio_standard = $request->input('precio_standard');
        $ruta->serv_cargo = $request->input('servicios_cargo');
        $ruta->serv_libres = $request->input('servicios_sin');
        $ruta->vehiculo_descripcion = $request->input('descripcion_vehiculo');
        $ruta->vehiculo_capacidad = $request->input('tipo_vehiculo');
        $ruta->vehiculo_tipo = $request->input('capacidad');
        $ruta->save();
        $servicios = $request->input('servicios');
        $idruta = $ruta->id;
        $transporte = $ruta->id_transporte;
        $this->saveeditservicios($idruta, $servicios);

        return redirect()->route('rutastransport',[$transporte]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruta = Ruta::where('id',$id)->get()->first();
        $transporte = $ruta->id_ruta;
        Ruta::destroy($id);

        return redirect()->route('rutastransport',[$transporte]);


    }

    private function storestuff($transporte){
        $servicios = DB::table('servtrans')->get();
        $localservicios = array();
        $total_servicios = count($servicios);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $tempservicio = array(
                    'id_ruta' => $transporte,
                    'id_servicio' => $servicio->id,
                    'cargo' => 0,
                    'activo' => 0
                );
                array_push($localservicios, $tempservicio);
            }

            if(count($localservicios) > 0)
                DB::table('serv_transportes')->insert($localservicios);
        }
    }
    private function saveservicios($idruta, $servicios){
        $total_servicios = count($servicios);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $actual = Servicio_Transporte::where('id_servicio', $servicio)->where('id_ruta',$idruta)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }
    }

    private function saveeditservicios($idruta, $servicios){
        $total_servicios = count($servicios);
        $actuales = Servicio_Transporte::where('id_ruta', $idruta)->get();
        foreach($actuales as $actual){
            $actual->activo = 0;
            $actual->save();
        }
        if($total_servicios > 0){
            foreach ($servicios as $service) {
                $serv = Servicio_Transporte::where('id_servicio', $service)->get()->first();
                $serv->activo = 1;
                $serv->save();
            }
        }
    }

    public function costosruta($id){
        $ruta = Ruta::where('id','=',$id)->get()->first();
        return view('providers.transportes.rutas.costos',compact('ruta'));
    }

    public function loadingfile()
    {

        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
        // Show file content.
            $file = public_path() . '/dopbcp/php-file/data/contentruta' . $_POST['dopbcp_calendar_id'] . '.txt';

            if (file_exists($file)) {
                echo file_get_contents($file);
            } else {
                echo '';
            }
        }
    }

    public function savingfile()
    {
        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
// Save data in a file in folder data.
            $file = fopen(public_path() . '/dopbcp/php-file/data/contentruta' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
            fwrite($file, $_POST['dopbcp_schedule']);
            fclose($file);
        }
    }

}
