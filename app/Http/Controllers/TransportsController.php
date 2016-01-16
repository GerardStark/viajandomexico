<?php

namespace App\Http\Controllers;

use App\Servicio_Transporte;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Galeria;
use App\Ruta;
use App\Vehiculo;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Transporte;
use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class TransportsController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }

    public function registertransport(Request $request){


        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $transporte = new Transporte();
        $transporte->owner = $request->input('owner');
        $transporte->name = $request->input('name');
        $transporte->id_galeria = $this->creategallery();
        $transporte->tipo_servicio = $request->input('tipo_servicio');
        $transporte->horario = $request->input('horario');
        $transporte->tipo_transporte = $request->input('tipo_transporte');
        $transporte->tipo_vehiculo = $request->input('tipo_vehiculo');
        $transporte->servicios = $request->input('servicios_sin');
        $transporte->servicios_cargo = $request->input('servicios_cargo');
        $transporte->estado = $request->input('pais');
        $transporte->municipio = $request->input('estado');
        $transporte->localidad = $request->input('ciudad');
        $transporte->direccion = $request->input('direccion');
        $transporte->descripcion = $request->input('descripcion');
        $transporte->latitud = $request->input('latitud');
        $transporte->longitud = $request->input('longitud');
        $transporte->cp = $request->input('codigo_postal');
        $servicios = $request->input('servicios');
        $transporte->save();
        $transporte_id = $transporte->id;
        $this->storestuff($transporte_id);
        $this->saveservicios($transporte_id, $servicios);



        return redirect()->route('mis_servicios');
    }

    //-----------------------------------------------------------------------------------------------------------------

    private function storestuff($transporte){
        $servicios = DB::table('servtrans')->get();
        $localservicios = array();
        $total_servicios = count($servicios);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $tempservicio = array(
                    'id_transporte' => $transporte,
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
    private function saveservicios($transporte, $servicios){
        $total_servicios = count($servicios);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $actual = Servicio_Transporte::where('id_servicio', $servicio)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }

    }


 //---------------------------------------------------------------------------------------------------------------------



    private function creategallery(){
        $galeria = new Galeria;
        $galeria->nombre = 'From transports';
        $galeria->save();

        return $galeria->id;
    }

    public function edittransport($id)
    {
        $transporte = Transporte::where('id', '=', $id)->get()->first();
        $serviciostransporte = Servicio_Transporte::where('id_transporte', $id)->get();
        $servicios = DB::table('servtrans')->orderBy('id')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.transportes.edittransport', compact('transporte', 'servicios', 'serviciostransporte','estados' ));
    }

    public function updatetransport(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        //probando dos commits
        $transporte = Transporte::find($id);
        $transporte->owner = $request->input('owner');
        $transporte->name = $request->input('name');
        $transporte->tipo_servicio = $request->input('tipo_servicio');
        $transporte->horario = $request->input('horario');
        $transporte->tipo_transporte = $request->input('tipo_transporte');
        $transporte->tipo_vehiculo = $request->input('tipo_vehiculo');
        $transporte->servicios = $request->input('servicios_sin');
        $transporte->servicios_cargo = $request->input('servicios_cargo');
        $transporte->descripcion = $request->input('descripcion');
        $transporte->estado = $request->input('pais');
        $transporte->municipio = $request->input('estado');
        $transporte->localidad = $request->input('ciudad');
        $transporte->direccion = $request->input('direccion');
        $transporte->latitud = $request->input('latitud');
        $transporte->longitud = $request->input('longitud');
        $transporte->cp = $request->input('codigo_postal');
        $servicios = $request->input('servicios');
        $transporte->save();
        $transporte_id = $transporte->id;
        $this->saveeditservicios($transporte_id, $servicios);

        return redirect()->route('mis_servicios');
    }

    private function saveeditservicios($transporte, $servicios)
    {
        $total_servicios = count($servicios);
        $actuales = Servicio_Transporte::where('id_transporte', $transporte)->get();
        foreach ($actuales as $actual) {
            $actual->activo = 0;
            $actual->save();
        }

        if ($total_servicios > 0) {
            foreach ($servicios as $servicio) {
                $actual = Servicio_Transporte::where('id_servicio', $servicio)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }


    }

    public function costostransport($id){
        $transporte = Transporte::where('id','=',$id)->get()->first();
        return view('providers.transportes.costostransportes',compact('transporte'));
    }

    public function loadingfile()
    {

        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
            // Show file content.
            $file = public_path() . '/dopbcp/php-file/data/contenttransport' . $_POST['dopbcp_calendar_id'] . '.txt';

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
            $file = fopen(public_path() . '/dopbcp/php-file/data/contenttransport' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
            fwrite($file, $_POST['dopbcp_schedule']);
            fclose($file);
        }
    }

    public function rutastransport($id){
        $transporte = Transporte::where('id',$id)->get()->first();
        $rutas = Ruta::where('id_transporte', '=' ,$id)->get();

        return view('providers.transportes.rutas.index', compact('transporte', 'rutas'));
    }

    public function eliminartransport($id, Request $request){
        Transporte::destroy($id);
        return redirect()->back()->with('alert', 'Transporte Eliminado con Exito');
    }

}
