<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\City;
use App\Properties;
use App\Network;
use App\Testimonials;
use App\Subscriber;
use App\Partners;
use App\Transaction;
use App\Articulos;
use App\News;
use Baum\Node;

use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class IndexController extends Controller
{


    public function index()
    {
    	if(!$this->alreadyInstalled()) {
            return redirect('install');
        }

    	$city_list = City::where('status','1')->orderBy('city_name')->get();

		$propertieslist = Properties::where('status','1')->orderBy('id', 'desc')->take(8)->get();

    $articulos = Articulos::orderBy('id','desc')->take(4)->get();

    $news = News::orderBy('id','desc')->take(4)->get();

		$testimonials = Testimonials::orderBy('id', 'desc')->get();

		$partners = Partners::orderBy('id', 'desc')->get();

    $transacciones = Transaction::where('origen','!=','Csv')->where('status','!=','1')->where('status','!=','4')->get();
    foreach ($transacciones as $transaccion) {
      $url = "https://api.payulatam.com/reports-api/4.0/service.cgi";
      $data_json='{
     "test": false,"language": "en","command": "ORDER_DETAIL_BY_REFERENCE_CODE","merchant": {
        "apiLogin": "T102JZRA926hzg9",
        "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
     },
     "details": {  "referenceCode": "'.$transaccion->id.'"   } }';
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response  = curl_exec($ch);
      curl_close($ch);

      $obj = (json_decode($response));


      //dd(($obj->result->payload[0]->status)); // estado de orden
      if(!empty($obj->result)){
      $respuesta = ($obj->result->payload[0]->transactions[0]->transactionResponse->state);
      //echo $respuesta." ".$transaccion->id. "<br>";

      if ($respuesta=="PENDING") {
        $transaccion->status = "0";
      }
      if ($respuesta=="CAPTURING_DATA") {
        $transaccion->status = "0";
      }

      if ($respuesta=="APPROVED") {
        $transaccion->status = "1";
      }
      if ($respuesta=="DECLINED") {
        $transaccion->status = "2";
      }
      if ($respuesta=="ERROR") {
        $transaccion->status = "3";
      }
      if ($respuesta=="EXPIRED") {
        $transaccion->status = "4";
      }


    }else{
      $transaccion->status = "3";
    }
    if (empty($transaccion->status)) {
      $transaccion->status = "0";
    }


    $transaccion->save();

    }






        return view('pages.index',compact('propertieslist','testimonials','partners','city_list','articulos' ,'news'));
    }

    public function subscribe(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

	    $rule=array(
		        'email' => 'required|email|max:75'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                echo '<p style="color: #db2424;font-size: 20px;">The email field is required.</p>';
                exit;
        }

    	$subscriber = new Subscriber;

    	$subscriber->email = $inputs['email'];
    	$subscriber->ip = $_SERVER['REMOTE_ADDR'];


	    $subscriber->save();

	    echo '<p style="color: #189e26;font-size: 20px;">Gracias por suscribirse</p>';
        exit;

    }

	/**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }


	public function aboutus_page()
    {
        return view('pages.about');
    }

    public function credits_page()
      {
          return view('pages.credits');
      }

    public function profile()
    {
        return view('pages.profile');
    }

    public function postProfile()
    {
        return view('pages.profile');
    }



    public function transactions()
    {
      $transacciones = Transaction::where('origen','!=','Csv')->where('status','!=','1')->get();
      foreach ($transacciones as $transaccion) {
        $url = "https://api.payulatam.com/reports-api/4.0/service.cgi";
        $data_json='{
       "test": false,"language": "en","command": "ORDER_DETAIL_BY_REFERENCE_CODE","merchant": {
          "apiLogin": "T102JZRA926hzg9",
          "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
       },
       "details": {  "referenceCode": "'.$transaccion->id.'"   } }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);

        $obj = (json_decode($response));


        //dd(($obj->result->payload[0]->status)); // estado de orden
        if(!empty($obj->result)){
        $respuesta = ($obj->result->payload[0]->transactions[0]->transactionResponse->state);
        //echo $respuesta." ".$transaccion->id. "<br>";

        if ($respuesta=="PENDING") {
          $transaccion->status = "0";
        }
        if ($respuesta=="CAPTURING_DATA") {
          $transaccion->status = "0";
        }

        if ($respuesta=="APPROVED") {
          $transaccion->status = "1";
        }
        if ($respuesta=="DECLINED") {
          $transaccion->status = "2";
        }
        if ($respuesta=="ERROR") {
          $transaccion->status = "3";
        }
        if ($respuesta=="EXPIRED") {
          $transaccion->status = "4";
        }


      }else{
        $transaccion->status = "3";
      }
      if (empty($transaccion->status)) {
        $transaccion->status = "0";
      }


      $transaccion->save();

      }


        $transacciones = Transaction::where('user_id','=',Auth::user()->id)->get();
        return view('pages.transactions')->with('transacciones',$transacciones);
    }


    public function careers_with_page()
    {
        return view('pages.careers');
    }

    public function terms_conditions_page()
    {
        return view('pages.terms_conditions');
    }

    public function privacy_policy_page()
    {
        return view('pages.privacy');
    }

    public function contact_us_page()
    {
        return view('pages.contact');
    }

    public function contact_us_sendemail(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

	    $rule=array(
		        'name' => 'required',
				'email' => 'required|email',
		        'user_message' => 'required'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }



        Mail::send('emails.contact',
        array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'user_message' => $inputs['user_message']
        ), function($message)
	    {
	        $message->from(getcong('site_email'));
	        $message->to(getcong('site_email'), getcong('site_name'))->subject(getcong('site_name').' Contact');
	    });



 		 return redirect()->back()->with('flash_message', 'Gracias por contactarnos');
    }


    /**
     * Do user login
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
    	if (Auth::check()) {

            return redirect('admin/dashboard');
        }

        return view('pages.login');
    }


    public function postLogin(Request $request)
    {

    //echo bcrypt('123456');
    //exit;

      $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');



         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->status=='0'){
                \Auth::logout();
                return redirect('/login')->withErrors('Your account is not activated yet, please check your email.');
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/login')->withErrors('El correo o la contraseña son invalidos.');

    }

     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        if (Auth::user()->usertype=="Admin") {
         return redirect('/admin/dashboard');
       }else{
         return redirect('/app');
       }

    }

    public function register()
    {
    	if (Auth::check()) {

            return redirect('admin/dashboard');
        }

        $city_list = City::where('status','1')->orderBy('city_name')->get();

        return view('pages.register',compact('city_list'));
    }

    public function postRegister(Request $request)
    {

    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();
      print_r($inputs);

	    $rule=array(
		        'name' => 'required',
            'id' => 'required|unique:users',
		        'email' => 'required|email|max:75|unique:users'
		   		 );

	   	 $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }


        if (!empty($request->referred)) {
        $referido = User::where('email','=',$request->referred)->first();

          if(empty($referido->email)){
            \Session::flash('flash_message', 'El referido no se encuentra en nuestra base de datos.');
            return \Redirect::back();
          }else {
          $padre = Network::where('user_id','=',$referido->id)->first();

            if(empty($padre->id)){
              $network= new Network();
              $network->parent_id= null;
              $network->user_id =$referido->id;
              $network->save();
              $padre = Network::where('user_id','=',$referido->id)->first();
              $network= new Network();
              $network->user_id=$request->id;
              $network->save();
              $network->makeChildOf($padre);
            }else{
              $network= new Network();
              $network->user_id=$request->id;
              $network->save();
              $network->makeChildOf($padre);
             }
        }
        }else{
            $network= new Network();
            $network->parent_id= null;
            $network->user_id=$request->id;
            $network->save();
        }


        $user = new User;

		$string = str_random(15);
        $user->id=$inputs['id'];
		$user_name= $inputs['name'];
		$user_email= $inputs['email'];

		$user->usertype = "Owner";
		$user->name = $user_name;
		$user->email = $user_email;
		$user->password= bcrypt("mir2017ñ");
		$user->phone= $inputs['phone'];
		$user->city= $inputs['city'];
        $user->address= $inputs['address'];
        $user->referred= $inputs['referred'];
		$user->confirmation_code= $string;
	    $user->save();

      $response = Password::sendResetLink($request->only('email'), function (Message $message) {
      $message->subject('Contraseña de Mir Colombia');
      $message->sender(getcong('site_email'));
      });



            \Session::flash('flash_message', 'Por favor, verifique su cuenta. Enviaremos un enlace de verificación a la dirección de correo electrónico.');

            return \Redirect::back();


    }

		public function blog()
		{
					$articulos = Articulos::orderBy('id','desc')->paginate(10);
  				return view('pages.blog')->with('articulos',$articulos);
		}

    public function article($id)
		{

					$articulo= Articulos::find($id);
  				return view('pages.article')->with('articulo',$articulo);
		}

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        //return redirect('admin/');
        return redirect('/');
    }

    public function confirm($code)
    {

        $user = User::where('confirmation_code',$code)->first();

 		$user->status = '1';

 		$user->save();

 		\Session::flash('flash_message', 'Confirmación correcta...');

        return view('pages.login');
    }

    public function verificarTransacciones(){



      $transacciones = Transaction::where('origen','!=','Csv')->where('status','!=','1')->get();
      foreach ($transacciones as $transaccion) {
        $url = "https://api.payulatam.com/reports-api/4.0/service.cgi";
        $data_json='{
       "test": false,"language": "en","command": "ORDER_DETAIL_BY_REFERENCE_CODE","merchant": {
          "apiLogin": "T102JZRA926hzg9",
          "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
       },
       "details": {  "referenceCode": "'.$transaccion->id.'"   } }';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);

        $obj = (json_decode($response));


        //dd(($obj->result->payload[0]->status)); // estado de orden
        if(!empty($obj->result)){
        $respuesta = ($obj->result->payload[0]->transactions[0]->transactionResponse->state);
        echo $respuesta." ".$transaccion->id. "<br>";

        if ($respuesta=="PENDING") {
          $transaccion->status = "0";
        }
        if ($respuesta=="CAPTURING_DATA") {
          $transaccion->status = "0";
        }

        if ($respuesta=="APPROVED") {
          $transaccion->status = "1";
        }
        if ($respuesta=="DECLINED") {
          $transaccion->status = "2";
        }
        if ($respuesta=="ERROR") {
          $transaccion->status = "3";
        }
        if ($respuesta=="EXPIRED") {
          $transaccion->status = "4";
        }


      }else{
        $transaccion->status = "3";
      }
      if (empty($transaccion->status)) {
        $transaccion->status = "0";
      }


      $transaccion->save();

      }

    //  return view('pages.transactions')->with('transacciones',$transacciones);

    }






}
