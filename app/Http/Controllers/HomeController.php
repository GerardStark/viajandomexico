<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
    public function panel(){
        return view ('home');
    }
    public function about(){

        return view('landing.about');
    }
    public function contact(){

        return view('landing.contact');
    }
    public function testimonials(){

        return view('landing.testimonials');
    }
    public function newRegister(){

        return redirect()->route('registerprovider');
    }
}
