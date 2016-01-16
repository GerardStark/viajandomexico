<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Restaurante;
use App\Pais;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class RestaurantController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
        ]);
    }

    public function registerrestaurant(Request $request){


        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $restaurant = new Restaurante();
        $restaurant->owner = $request->input('owner');
        $restaurant->nombre = $request->input('nombre');
        $restaurant->id_galeria = $this->creategallery();
        $restaurant->tipo_alimento = $request->input('tipo_alimento');
        $restaurant->descripcion = $request->input('descripcion');
        $restaurant->estado = $request->input('estado');
        $restaurant->ciudad = $request->input('ciudad');
        $restaurant->direccion = $request->input('direccion');
        $restaurant->latitud = $request->input('latitud');
        $restaurant->longitud = $request->input('longitud');
        $restaurant->cp = $request->input('codigo_postal');

        $restaurant->save();


        return redirect()->route('mis_servicios');
    }

    private function creategallery(){
        $galeria = new Galeria;
        $galeria->nombre = 'From restaurantes';
        $galeria->save();

        return $galeria->id;
    }

    public function storeimage(Request $request)
    {
        $restaurant = Tour::find($request->input('id'));
        $galeriaid = $restaurant->id_galeria;
        $path = public_path().$request->input('path');
        $files = $request->file('file');
        foreach($files as $file){
            $fileName = strtolower(str_random(40) .'.'. $file->getClientOriginalExtension());
            $file->move($path, $fileName);
            $galimg = new Galeria_Imagen;
            $galimg->id_galeria = $galeriaid;
            $galimg->nombre = $fileName;
            $galimg->save();
        }
    }
    public function editrestaurant($id){
        $restaurant = Restaurante::where('id','=', $id)->get()->first();
        $paises = Pais::where('active','=',1)->orderBy('nombre')->get();


        return view('providers.serviciosturisticos.editrestaurant',compact('restaurant', 'paises'));
    }


    public function updaterestaurant(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $restaurant = Restaurante::find($id);
        $restaurant->owner = $request->input('owner');
        $restaurant->nombre = $request->input('nombre');
        $restaurant->tipo_alimento = $request->input('tipo_alimento');
        $restaurant->descripcion = $request->input('descripcion');
        $restaurant->estado = $request->input('estado');
        $restaurant->ciudad = $request->input('ciudad');
        $restaurant->direccion = $request->input('direccion');
        $restaurant->latitud = $request->input('latitud');
        $restaurant->longitud = $request->input('longitud');
        $restaurant->cp = $request->input('codigo_postal');

        $restaurant->save();

        return redirect()->route('mis_servicios');
    }

//    public function costosrestaurante($id){
//        $restaurante = Restaurante::where('id','=',$id)->get()->first();
//        return view('providers.serviciosturisticos.costosrestaurant',compact('restaurante'));
//    }

    public function loadingfile()
    {

        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
// Show file content.
            $file = public_path() . '/dopbcp/php-file/data/content' . $_POST['dopbcp_calendar_id'] . '.txt';

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
            $file = fopen(public_path() . '/dopbcp/php-file/data/content' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
            fwrite($file, $_POST['dopbcp_schedule']);
            fclose($file);
        }
    }

    public function eliminarrestaurant($id, Request $request){
        Restaurante::destroy($id);
        return redirect()->back()->with('alert', 'Restaurante Eliminado con Exito');
    }
}
