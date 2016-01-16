<?php

namespace App\Http\Controllers;

use App\Amenidad;
use App\Galeria;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Amenidad_Habitacion;
use App\Galeria_Imagen;
use App\Habitacion;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class HabitacionesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
        ]);
    }

    public function index($id){

        $habitacion = Habitacion::where('id_hotel','=', $id)->get();
        $hotel = Hotel::where('id','=', $id)->get()->first();
    return view('providers.hoteles.habitaciones.index',compact('habitacion','hotel'));
    }

    public function createhabitacion($id){
        $amenidades = DB::table('amenidades')->orderBy('nombre')->get();
        $hotel = Hotel::where('id','=', $id)->get()->first();
        return view('providers.hoteles.habitaciones.createhabitacion',compact('amenidades','hotel'));
    }

    public function registerhabitacion(Request $request){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $habitacion = new Habitacion();
        $habitacion->nombre = $request->input('nombre');
        $habitacion->id_hotel=$request->input('id_hotel');
        $habitacion->tipo_habitacion = $request->input('tipo_habitacion');
        $habitacion->maximo_personas = $request->input('maximo_personas');
        $habitacion->cant_habitaciones = $request->input('cant_habitaciones');
        $habitacion->precio_estandar = $request->input('precio_estandar');
        $habitacion->descripcion_es = $request->input('descripcion_es');
        $habitacion->id_galeria = $this->creategallery();
        $amenidades = $request->input('amenidades');
        $habitacion->save();
        $hotel=$request->input('id_hotel');
        $habitacionid = $habitacion->id;
        $this->storestuff($habitacionid);
        $this->saveamenidades($habitacionid,$amenidades);

        return redirect()->route('habitacioneshotel',[$hotel]);
    }
    private function storestuff($habitacion){
        $amenidades = DB::table('amenidades')->get();
        $localservicios = array();
        $total_servicios = count($amenidades);

        if($total_servicios > 0){
            foreach ($amenidades as $amenidad) {
                $tempservicio = array(
                    'id_habitacion' => $habitacion,
                    'id_amenidad' => $amenidad->id,
                    'cargo' => 0,
                    'activo' => 0
                );
                array_push($localservicios, $tempservicio);
            }

            if(count($localservicios) > 0)
                DB::table('amenidades_habitacion')->insert($localservicios);
        }
    }

    private function saveamenidades($habitacion, $amenidades){
        $total_amenidades = count($amenidades);

        if($total_amenidades > 0){
            foreach ($amenidades as $amenidad) {
                $actual = Amenidad_Habitacion::where('id_amenidad', $amenidad)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }
    }

    public function edithabitacion($id){
        $habitacion = Habitacion::where('id','=', $id)->get()->first();
        $amenidadeshabitacion = Amenidad_Habitacion::where('id_habitacion', $id)->get();
        $amenidades = DB::table('amenidades')->orderBy('nombre')->get();
        $hotel = Hotel::where('id','=', $habitacion->id_hotel)->get()->first();
        return view('providers.hoteles.habitaciones.edit_habitacion',compact('habitacion', 'amenidades','amenidadeshabitacion','hotel'));
    }

    public function updatehabitacion(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $habitacion = Habitacion::find($id);
        $habitacion->nombre = $request->input('nombre');
        $habitacion->id_hotel = $request->input('id_hotel');
        $habitacion->tipo_habitacion = $request->input('tipo_habitacion');
        $habitacion->maximo_personas = $request->input('maximo_personas');
        $habitacion->cant_habitaciones = $request->input('cant_habitaciones');
        $habitacion->precio_estandar = $request->input('precio_estandar');
        $habitacion->descripcion_es = $request->input('descripcion_es');
        $habitacion->id_galeria = $this->creategallery();
        $amenidades = $request->input('amenidades');
        $habitacion->save();
        $hotel = $request->input('id_hotel');
        $habitacionid = $habitacion->id;
        $this->saveeditamenidades($habitacionid, $amenidades);

        return redirect()->route('habitacioneshotel', [$hotel]);
    }

    private function saveeditamenidades ($habitacion , $amenidades)
    {
        $total_amenidades = count($amenidades);
        $actuales = Amenidad_Habitacion::where('id', $amenidades)->get();
        foreach ($actuales as $actual) {
            $actual->activo = 0;
            $actual->save();
        }

        if ($total_amenidades > 0) {
            foreach ($amenidades as $amenidad) {
                $actual = Amenidad_Habitacion::where('id_amenidad', $amenidad)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }
    }


        private function creategallery()
        {
            $galeria = new Galeria;
            $galeria->nombre = 'From Habitaciones';
            $galeria->save();

            return $galeria->id;
        }


        public function craetecalendario($id)
        {
            $habitacion = Habitacion::where('id', '=', $id)->get()->first();

            return view('providers.hoteles.habitaciones.calendario', compact('habitacion'));
        }

        public function loadingfile()
        {

            if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
// Show file content.
                $file = public_path() . '/dopbcp/php-file/data/contenthabit' . $_POST['dopbcp_calendar_id'] . '.txt';

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
                $file = fopen(public_path() . '/dopbcp/php-file/data/contenthabit' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
                fwrite($file, $_POST['dopbcp_schedule']);
                fclose($file);
            }
        }

        public function eliminarhabitacion($id, Request $request)
        {
            Transporte::destroy($id);
            return redirect()->back()->with('alert', 'Habitacion Eliminada con Exito');
        }

}
