<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\City;
use App\Transaction;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;



class IndexController extends MainAdminController
{

    public function index()
    {
      if (empty(Auth::User())) {
        \Session::flash('flash_message', 'Ingrese su Usuario y Contraseña de Administrador');

        return redirect('/login');
      }
    	if (Auth::check()) {
            return redirect('app/dashboard');
      }


    }

    public function aportes(){
      $transacciones =  Transaction::where('user_id','=',Auth::user()->id)->where('status','=','1')->where('type','=','4')->orderBy('date','desc')->get();
      return view('app.pages.aportes',compact('transacciones'));
    }
    public function ladrillos(){
      $transacciones =  Transaction::where('user_id','=',Auth::user()->id)->where('status','=','1')->where('type','=','1')->orderBy('date','desc')->get();
      return view('app.pages.ladrillos',compact('transacciones'));
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
