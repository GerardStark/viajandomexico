<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use Validator;
use Storage;
use File;


class AccountController extends Controller
{

    public function getPassword()
    {
        return view('account/password');
    }

    public function postPassword(Request $request)
    {
        $user = $request->user();

        if(!Hash::check($request->get('current_password'), $user->password))
        {
            return redirect()->back()->withErrors([
               'current_password' => 'La contraseña actual no es valida'
            ]);
        }

        $this->validate($request, [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect('mis_servicios')
            ->with('alert', 'tu contraseña ha sido cambiada');
    }

    public function editProfile(Request $request)
    {
        return view('account/edit-profile', [
            'user' => $request->user()
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required|min:2'
        ]);
        $user->name = $request->input('name');
        $user->apellidos = $request->input('apellido');
        $user->direccion = $request->input('direccion');
        $user->descripcion = $request->input('descripcion');
        $path = public_path().$request->input('path');
        $file = $request->file('foto_perfil');
        $fileName = strtolower(str_random(40) .'.'. $file->getClientOriginalExtension());
        $file->move($path, $fileName);
        $user->foto_perfil = $fileName;
        $user->save();
//        $this->profilepic($user->foto_perfil, $path,$user->id);

        return redirect('mis_servicios')
            ->with('alert', 'Tu perfil ha sido actualizado');
    }
    protected function profilepic($imgfile, $path,$iduser){
        $img = Image::make($path.'/'.$iduser.'/'.$imgfile)->resize(300,300);
        $img->move($path,$imgfile);
    }

    public function verify(Request $request){

        return view('account/verify', [
            'user' => $request->user()
        ]);
    }

    public function resend(Request $request){
        $user = $request->user();
        $user->registration_token = str_random(40);
        $user->save();
        $url = route('confirmation', ['token' => $user->registration_token]);
        Mail::send('emails/registration', compact('user', 'url'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Activa tu cuenta!');
        });
        return redirect()->route('mis_servicios')
            ->with('alert', 'Por favor confirma tu email: ' . $user->email);
    }
}
