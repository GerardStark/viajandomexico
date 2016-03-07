<?php

namespace App\Http\Controllers;

use     App\Estado;
use App\Galeria;
use App\Transporte;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Galeria_Imagen;
use App\Hotel;
use App\Municipio;
use App\Localidad;
use App\Servicio_Hotel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ProvidersController extends Controller
{
    public function divisas (){
        $divisas = [
            'dolar' => 17,
            'euro' => 18
        ];
        return view('providers.provider_divisas', compact('divisas', 'provider'));
    }

    public function createnewservice(){
        $servicios = DB::table('servicios')->orderBy('nombre')->get();
        $especiales = DB::table('necesidades_espesificas')->orderBy('nombre')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        $incluye = DB::table('incluye')->orderBy('nombre')->get();
        $serviciostur = DB::table('servtrans')->orderBy('nombre')->get();

        return view('providers.create_services', compact('servicios','especiales','incluye','serviciostur','estados'));
    }

    public function servicios(){
        $hoteles = DB::table('hoteles')->where('owner', Auth::user()->id)->get();
        $tours = DB::table('tours')->where('owner', Auth::user()->id)->get();
        //$transports = DB::table('transportes')->where ('owner',Auth::user()->id)->get();
        $transports = Transporte::where ('owner',Auth::user()->id)->get();
        $restaurantes = DB::table('restaurantes')->where ('owner',Auth::user()->id)->get();
        $bares = DB::table('bares')->where ('owner',Auth::user()->id)->get();
        $spas = DB::table('spas')->where ('owner',Auth::user()->id)->get();

        return view('providers.provider_services', compact('hoteles','tours','transports','restaurantes','bares', 'spas'));
    }

    public function createhotel(){

        $servicios = DB::table('servicios')->orderBy('nombre')->get();
        $especiales = DB::table('necesidades_espesificas')->orderBy('nombre')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.hoteles.createhotel', compact('servicios','especiales','estados'));
    }

    public function createtour(){
        $incluye = DB::table('incluye')->orderBy('nombre')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.tours.createtour', compact('','incluye','estados'));
    }

    public function createtransport(){
        $servicios = DB::table('servtrans')->orderBy('nombre')->get();
        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.transportes.createtransport', compact('servicios','estados'));
    }

    public function createservtour(){

        return view('providers.serviciosturisticos.createservtur', compact('estados'));
    }

    public function createrestaurant(){

        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.serviciosturisticos.createrestaurant', compact('estados'));
    }

    public function createbar(){

        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.serviciosturisticos.createbar', compact('estados'));
    }

    public function createspa(){

        $estados = DB::table('estados')->orderBy('nombre')->get();
        return view('providers.serviciosturisticos.createspa', compact('estados'));
    }

    public function filterbystate($id){
        $ciudades = Localidad::where('municipio_id', $id)->get();
        return Response()->json($ciudades);
    }

    public function filterbycountry($id){
        $estados = Municipio::where('estado_id', '=', $id)->get();
        return Response()->json($estados);
    }

}



