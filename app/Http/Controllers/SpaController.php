<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Spa;
use App\Pais;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class SpaController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
        ]);
    }

    public function registerspa(Request $request){


        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $spa = new Spa();
        $spa->owner = $request->input('owner');
        $spa->nombre = $request->input('nombre');
        $spa->id_galeria = $this->creategallery();
        $spa->tipo = $request->input('tipo');
        $spa->descripcion = $request->input('descripcion');
        $spa->estado = $request->input('estado');
        $spa->ciudad = $request->input('ciudad');
        $spa->direccion = $request->input('direccion');
        $spa->latitud = $request->input('latitud');
        $spa->longitud = $request->input('longitud');
        $spa->cp = $request->input('codigo_postal');

        $spa->save();


        return redirect()->route('mis_servicios');
    }

    private function creategallery(){
        $galeria = new Galeria;
        $galeria->nombre = 'From spas';
        $galeria->save();

        return $galeria->id;
    }

      public function editspa($id){
        $spa = Spa::where('id','=', $id)->get()->first();
        $paises = Pais::where('active','=',1)->orderBy('nombre')->get();


        return view('providers.serviciosturisticos.editspa',compact('spa', 'paises'));
    }


    public function updatespa(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $spa = Spa::find($id);
        $spa->owner = $request->input('owner');
        $spa->nombre = $request->input('nombre');
        $spa->id_galeria = $this->creategallery();
        $spa->tipo = $request->input('tipo');
        $spa->descripcion = $request->input('descripcion');
        $spa->estado = $request->input('estado');
        $spa->ciudad = $request->input('ciudad');
        $spa->direccion = $request->input('direccion');
        $spa->latitud = $request->input('latitud');
        $spa->longitud = $request->input('longitud');
        $spa->cp = $request->input('codigo_postal');

        $spa->save();

        return redirect()->route('mis_servicios');
    }

    public function costosspa($id){
        $spa = Spa::where('id','=',$id)->get()->first();
        return view('providers.serviciosturisticos.costosspa',compact('spa'));
    }

    public function loadingfile()
    {

        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
// Show file content.
            $file = public_path() . '/dopbcp/php-file/data/contentspa' . $_POST['dopbcp_calendar_id'] . '.txt';

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
            $file = fopen(public_path() . '/dopbcp/php-file/data/contentspa' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
            fwrite($file, $_POST['dopbcp_schedule']);
            fclose($file);
        }
    }

    public function eliminarspa($id, Request $request){
        Spa::destroy($id);
        return redirect()->back()->with('alert', 'Spa Eliminado con Exito');
    }
}
