<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Bar;
use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;


class BarController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
        ]);
    }

    public function registerbar(Request $request){


        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $bar = new Bar();
        $bar->owner = $request->input('owner');
        $bar->nombre = $request->input('nombre');
        $bar->id_galeria = $this->creategallery();
        $bar->tipo = $request->input('tipo');
        $bar->descripcion = $request->input('descripcion');
        $bar->estado = $request->input('pais');
        $bar->municipio = $request->input('estado');
        $bar->localidad = $request->input('ciudad');
        $bar->direccion = $request->input('direccion');
        $bar->latitud = $request->input('latitud');
        $bar->longitud = $request->input('longitud');
        $bar->cp = $request->input('codigo_postal');

        $bar->save();


        return redirect()->route('mis_servicios');
    }

    private function creategallery(){
        $galeria = new Galeria;
        $galeria->nombre = 'From bares';
        $galeria->save();

        return $galeria->id;
    }

    public function editbar($id){
        $bar = Bar::where('id','=', $id)->get()->first();
        $estados = DB::table('estados')->orderBy('nombre')->get();


        return view('providers.serviciosturisticos.editbar',compact('bar', 'estados'));
    }

    public function updatebar(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $bar = Bar::find($id);
        $bar->nombre = $request->input('nombre');
        $bar->tipo = $request->input('tipo');
        $bar->descripcion = $request->input('descripcion');
        $bar->estado = $request->input('pais');
        $bar->municipio = $request->input('estado');
        $bar->localidad = $request->input('ciudad');
        $bar->direccion = $request->input('direccion');
        $bar->latitud = $request->input('latitud');
        $bar->longitud = $request->input('longitud');
        $bar->cp = $request->input('codigo_postal');
        $bar->save();

        return redirect()->route('mis_servicios');
    }

//    public function costosbar($id){
//        $bar = Bar::where('id','=',$id)->get()->first();
//        return view('providers.serviciosturisticos.costosbar',compact('bar'));
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

    public function eliminarbar($id, Request $request){
        Bar::destroy($id);
        return redirect()->back()->with('alert', 'Bar Eliminado con Exito');
    }
}
