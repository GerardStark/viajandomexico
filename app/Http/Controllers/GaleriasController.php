<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
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
use Storage;
use File;

class GaleriasController extends Controller
{

    public function storeimage(Request $request)
    {
        $galeriaid = $request->input('id_galeria');
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
        return redirect()->route('creategaleria',[$galeriaid]);
    }

    public function creategaleria($id){
        $imagenes = DB::table('galeria_imagenes')
            ->where('id_galeria', $id)
            ->get();
        $galeria = $id;
        return view('providers.galerias.creategalery', compact('galeria', 'imagenes'));
    }

    public function updategaleria(Request $request){
        $principal = $request->input('principal');
        $galeria = $request->input('galeriaid');
        $activos = $request->input('activos');
        $imagenes = Galeria_Imagen::where('id_galeria','=',$galeria)->get();
        if(!is_null($principal)){
            foreach($imagenes as $imagen){
                $imagen->principal = 0;
                $imagen->save();
            }
            $imagen = Galeria_Imagen::where('id','=',$principal)->get()->first();
            $imagen->principal = 1;
            $imagen->save();
        }
        if(count($activos)>0){
            foreach($imagenes as $imagen){
                $imagen->active = 0;
                $imagen->save();
            }
            foreach($activos as $activo){
                $img = Galeria_Imagen::where('id','=',$activo)->get()->first();
                $img->active = 1;
                $img->save();
            }

        }
        return Redirect()->back()->with('alert', 'Galeria Actualizada');;
    }

    public function eliminarimagen($id, Request $request){
        Galeria_Imagen::destroy($id);
        $path = $request->input('deleteimg');
        File::delete(public_path().$path);

        return redirect()->back()->with('alert', 'Imagen Eliminada con Exito');
    }
}
