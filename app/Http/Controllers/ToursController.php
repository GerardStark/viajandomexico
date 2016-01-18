<?php

namespace App\Http\Controllers;

use App\Tour_Incluye;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Galeria;
use App\Servicio_Tour;
use App\Incluye;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Tour;
use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ToursController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_tour' => 'required|max:255',
        ]);
    }

    public function registertour(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $tour = new Tour();
        $tour->owner = $request->input('owner');
        $tour->nombre = $request->input('nombre_tour');
        $tour->descripcion = $request->input('descripcion');
        $tour->max_pax = $request->input('max_pax');
        $tour->min_pax = $request->input('min_pax');
        $tour->categoria = $request->input('categoria');
        $tour->otra_categoria = $request->input('otra_categoria');
        $tour->horario_inicio = $request->input('horario_inicio');
        $tour->horario_fin = $request->input('horario_fin');
        $tour->estado = $request->input('pais');
        $tour->municipio = $request->input('estado');
        $tour->localidad = $request->input('ciudad');
        $tour->direccion = $request->input('direccion');
        $tour->latitud = $request->input('latitud');
        $tour->longitud = $request->input('longitud');
        $tour->cp = $request->input('codigo_postal');
        $tour->otros = $request->input('otros');
        $tour->id_galeria = $this->creategallery();
        $incluye = $request->input('incluye');
        $tour->save();
        $tourid = $tour->id;
        $this->storestuff($tourid);
        $this->saveincluye($tourid, $incluye);
        return redirect()->route('mis_servicios');
    }

    private function storestuff($tour)
    {
        $incluye = DB::table('incluye')->get();
        $localincludes = array();
        $total_includes = count($incluye);

        if ($total_includes > 0) {
            foreach ($incluye as $include) {
                $tempinclude = array(
                    'id_tour' => $tour,
                    'id_incluye' => $include->id,
                    'cargo' => 0,
                    'activo' => 0
                );
                array_push($localincludes, $tempinclude);
            }

            if (count($localincludes) > 0)
                DB::table('tour_incluye')->insert($localincludes);
        }

    }

    private function saveincluye($tour, $incluye)
    {
        $total_incluye = count($incluye);

        if ($total_incluye > 0) {
            foreach ($incluye as $include) {
                $actual = Servicio_Tour::where('id_incluye', $include)->get()->first();
                $actual->activo = 1;
                $actual->save();
            }
        }

    }

    private function creategallery()
    {
        $galeria = new Galeria;
        $galeria->nombre = 'From tours';
        $galeria->save();

        return $galeria->id;
    }

    public function edittour($id)
    {
        $tour = Tour::where('id', '=', $id)->get()->first();
        $incluye = Tour_Incluye::where('id_tour','=',$id)->get();;
        $estados = DB::table('estados')->orderBy('nombre')->get();


        return view('providers.tours.edittour', compact('tour', 'estados','incluye'));
    }


    public function updatetour(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $tour = Tour::find($id);
        $tour->owner = $request->input('owner');
        $tour->nombre = $request->input('nombre_tour');
        $tour->descripcion = $request->input('descripcion');
        $tour->max_pax = $request->input('max_pax');
        $tour->min_pax = $request->input('min_pax');
        $tour->categoria = $request->input('categoria');
        $tour->otra_categoria = $request->input('otra_categoria');
        $tour->horario_inicio = $request->input('horario_inicio');
        $tour->horario_fin = $request->input('horario_fin');
        $tour->estado = $request->input('pais');
        $tour->municipio = $request->input('estado');
        $tour->localidad = $request->input('ciudad');
        $tour->direccion = $request->input('direccion');
        $tour->latitud = $request->input('latitud');
        $tour->longitud = $request->input('longitud');
        $tour->cp = $request->input('codigo_postal');
        $tour->otros = $request->input('otros');
        $incluye = $request->input('incluye');
        $tour->save();
        $tourid = $tour->id;
        $this->saveeditincluye($tourid, $incluye);
        return redirect()->route('mis_servicios');

        $tour->save();
        $tourid = $tour->id;
        $this->saveeditincluye($tourid, $incluye);

        return redirect()->route('mis_servicios');
    }
    private function saveeditincluye($tour, $incluye)
    {
        $total_incluye = count($incluye);
        $actuales = Tour_Incluye::where('id_tour', $tour)->get();
        foreach ($actuales as $actual) {
            $actual->activo = 0;
            $actual->save();
        }

        if ($total_incluye > 0) {
            foreach ($incluye as $hay) {
                $inc = Tour_Incluye::where('id_incluye', $hay)->get()->first();
                $inc->activo = 1;
                $inc->save();
            }
        }
    }

    public function costostour($id){
        $tour = Tour::where('id','=',$id)->get()->first();
        return view('providers.tours.costostours',compact('tour'));
    }

    public function loadingfile()
    {

        if (isset($_POST['dopbcp_calendar_id'])) { // If calendar ID is received.
// Show file content.
            $file = public_path() . '/dopbcp/php-file/data/contenttour' . $_POST['dopbcp_calendar_id'] . '.txt';

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
            $file = fopen(public_path() . '/dopbcp/php-file/data/contenttour' . $_POST['dopbcp_calendar_id'] . '.txt', 'w');
            fwrite($file, $_POST['dopbcp_schedule']);
            fclose($file);
        }
    }
    public function eliminartour($id, Request $request){
       Tour::destroy($id);
       return redirect()->back()->with('alert', 'Tour Eliminado con Exito');
    }

  }