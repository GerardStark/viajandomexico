<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\User;
use App\Necesidad_Especial;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Hotel;
use App\Estado;
use App\Servicio_Hotel;
use App\Necesidad_Hotel;
use App\Plan_Hotel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class HotelesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);
    }

    public function registerhotel(Request $request){

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $hotel = new Hotel();
        $hotel->owner = $request->input('owner');
        $hotel->name = $request->input('name');
        $hotel->estrellas = $request->input('estrellas');
        $hotel->descripcion = $request->input('descripcion');
        $hotel->otros_serv = $request->input('otros_serv');
        $hotel->otras_nec = $request->input('otras_nececidades');
        $hotel->otro_plan = $request->input('otro_plan');
        $hotel->estado = $request->input('pais');
        $hotel->municipio = $request->input('estado');
        $hotel->localidad = $request->input('ciudad');
        $hotel->direccion = $request->input('direccion');
        $hotel->latitud = $request->input('latitud');
        $hotel->longitud = $request->input('longitud');
        $hotel->cp = $request->input('codigo_postal');
        $hotel->id_galeria = $this->creategallery();
        $servicios = $request->input('servicios');
//        $planes = $request->input('planes');
        $necesidades = $request->input('necesidades');
        $hotel->save();
        $hotelid = $hotel->id;
        $this->storestuff($hotelid);
        $this->saveservicios($hotelid,$servicios);
//        $this->saveplanes($hotelid, $planes);
        $this->savenecesidades($hotelid, $necesidades);
        return redirect()->route('mis_servicios');
    }

    private function storestuff($hotel){
        $servicios = DB::table('servicios')->get();
        $necesidades = DB::table('necesidades_espesificas')->get();
        $localservicios = array();
        $total_servicios = count($servicios);
        $localnecesidades = array();
        $total_necesidades = count($necesidades);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $tempservicio = array(
                    'id_hotel' => $hotel,
                    'id_servicio' => $servicio->id,
                    'cargo' => 0,
                    'activo' => 0
                );
                array_push($localservicios, $tempservicio);
            }

            if(count($localservicios) > 0)
                DB::table('servicios_hotel')->insert($localservicios);
        }
        if($total_necesidades > 0){
            foreach ($necesidades as $necesidad) {
                $tempnecesidades = array(
                    'id_hotel' => $hotel,
                    'id_necesidad' => $necesidad->id,
                    'cargo' => 0,
                    'activo' => 0
                );
                array_push($localnecesidades, $tempnecesidades);
            }

            if(count($localnecesidades) > 0)
                DB::table('necesidades_hotel')->insert($localnecesidades);
        }

    }
    private function saveservicios($hotel, $servicios){
        $total_servicios = count($servicios);

        if($total_servicios > 0){
            foreach ($servicios as $servicio) {
                $actual = Servicio_Hotel::where('id_servicio', $servicio)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }

    }

    private function savenecesidades($hotel, $necesidades){
        $total_necesidades = count($necesidades);

        if($total_necesidades > 0){
            foreach ($necesidades as $nececidad) {
                $actual = Necesidad_Hotel::where('id_necesidad', $nececidad)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }

    }

//    private function saveplanes($hotel, $planes){
//        $localplanes = array();
//        $total_planes = count($planes);
//
//        if($total_planes > 0){
//            foreach ($planes as $plan) {
//                $tempsplanes = array(
//                    'id_hotel' => $hotel,
//                    'id_tipo' => $plan
//                );
//                array_push($localplanes, $tempsplanes);
//            }
//
//            if(count($localplanes) > 0)
//                DB::table('hotel_tipo_plan')->insert($localplanes);
//        }
//    }

    public function edithotel($id){
        $hotel = Hotel::where('id','=', $id)->get()->first();
        $servicioshotel = Servicio_Hotel::where('id_hotel', $id)->orderby('id_servicio')->get();
        $especiales = DB::table('necesidades_espesificas')->orderBy('nombre')->get();
        $especialeshotel = Necesidad_Hotel::where('id_hotel',$id)->get();
        $planes = DB::table('tipos_plan')->orderBy('nombre')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        $planeshotel = Plan_hotel::where('id_hotel',$id)->get();;

        return view('providers.hoteles.edithotel',compact('hotel', 'servicios','servicioshotel','planes','estados','especiales','especialeshotel','planeshotel'));
    }

    public function updatehotel(Request $request, $id){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $hotel = Hotel::find($id);
        $hotel->owner = $request->input('owner');
        $hotel->name = $request->input('name');
        $hotel->estrellas = $request->input('estrellas');
        $hotel->descripcion = $request->input('descripcion');
        $hotel->otros_serv = $request->input('otros_serv');
        $hotel->otras_nec = $request->input('otras_nececidades');
        $hotel->otro_plan = $request->input('otro_plan');
        $hotel->estado = $request->input('pais');
        $hotel->municipio = $request->input('estado');
        $hotel->localidad = $request->input('ciudad');
        $hotel->direccion = $request->input('direccion');
        $hotel->latitud = $request->input('latitud');
        $hotel->longitud = $request->input('longitud');
        $hotel->cp = $request->input('codigo_postal');
        $servicios = $request->input('servicios');
//      $planes = $request->input('planes');
        $necesidades = $request->input('necesidades');
        $hotel->save();
        $hotelid = $hotel->id;
        $this->saveeditservicios($hotelid,$servicios);
//        $this->saveplanes($hotelid, $planes);
        $this->saveeditnecesidades($hotelid, $necesidades);
        return redirect()->route('mis_servicios');
    }

    private function saveeditservicios($hotel, $servicios){
        $total_servicios = count($servicios);
        $actuales = Servicio_Hotel::where('id_hotel', $hotel)->get();
        foreach($actuales as $actual){
            $actual->activo = 0;
            $actual->save();
        }
        if($total_servicios > 0){
            foreach ($servicios as $service) {
                $serv = Servicio_Hotel::where('id_servicio', $service)->get()->first();
                $serv->activo = 1;
                $serv->save();
            }
        }
    }

    private function saveeditnecesidades($hotel, $necesidades){
        $total_necesidades = count($necesidades);
        $actuales = Necesidad_Hotel::where('id_hotel', $hotel)->get();
        foreach($actuales as $actual){
            $actual->activo = 0;
            $actual->save();
        }

        if($total_necesidades > 0){
            foreach ($necesidades as $nececidad) {
                $nec = Necesidad_Hotel::where('id_necesidad', $nececidad)->get()->first();
                $nec->activo = 1;
                $nec->save();
            }
        }

    }

    private function creategallery(){
        $galeria = new Galeria;
        $galeria->nombre = 'From Hotels';
        $galeria->save();

        return $galeria->id;
    }

    public function eliminarhotel ($id, Request $request){
        Hotel::destroy($id);
        return redirect()->back()->with('alert', 'Hotel Eliminado con Exito');
    }

}



