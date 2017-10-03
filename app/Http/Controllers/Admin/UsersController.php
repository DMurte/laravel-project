<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Network;
use App\City;
use App\Brickstipes;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Baum\Node;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Bricks;
use App\Transaction;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Excel;


class UsersController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');

		 parent::__construct();

    }
    public function userslist()    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

        $allusers = User::where('usertype', '!=', 'Admin')->orderBy('id')->get();


        return view('admin.pages.users',compact('allusers'));
    }

    public function addeditUser()    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

         $city_list = City::orderBy('city_name')->get();

        return view('admin.pages.addeditUser',compact('city_list'));
    }

		public function transacciones(){
			$transacciones = Transaction::paginate(10);
			return view('admin.pages.transacciones',compact('transacciones'));
		}

		public function viewcsv(){

			if(Auth::User()->usertype!="Admin"){

					\Session::flash('flash_message', 'Access denied!');

					return redirect('admin/dashboard');

			}
			$productos = Bricks::all();

			 return view('admin.pages.csv',compact('productos'));
		}

		public function addcsv(Request $request){

			$productos = $request->producto;
			$comision = $request->comision;
			$cedula = $request->cedula;


$i=0;
			 	foreach($productos as $producto){

					$bricks = Bricks::find($producto);


					$transaccion = new Transaction;
					$transaccion->user_id= $cedula[$i];
					$transaccion->status= "1";
					$transaccion->bricks= $bricks->price;
					$transaccion->type= $bricks->tipo;
					$transaccion->packages_id= $bricks->tipo;
					$transaccion->origen= "Csv";
					$transaccion->save();

          Session::flash('flash_message', 'Csv Subido correctamente');

          return redirect()->back();


		 }





		}






    public function addnew(Request $request)
    {
    	$data =  \Input::except(array('_token')) ;

	    $inputs = $request->all();

		if(!empty($inputs['id'])){

            $user = User::findOrFail($inputs['id']);
						$user_rule_id = 'required';

        }else{

            $user = new User;
						$user_rule_id = 'required|unique:users';
						if (!empty($inputs['cc'])) {
							$user->id = $inputs['cc'];
							$inputs['id'] = $inputs['cc'];
							$nuevo = "1";
						}


        }

				$rule=array(
							'name' => 'required',
							'password' => 'min:6|max:15',
							'image_icon' => 'mimes:jpg,jpeg,gif,png',
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



		//User image
		$user_image = $request->file('image_icon');

        if($user_image){

            \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		    \File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');

            $tmpFilePath = 'upload/members/';

            $hardPath =  str_slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($user_image);

            $img->fit(376, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->image_icon = $hardPath;

        }

		$user->usertype = $inputs['usertype'];
		$user->name = $inputs['name'];
		$user->email = $inputs['email'];
		$user->phone = $inputs['phone'];
		$user->address = $inputs['address'];
		$user->city= $inputs['city'];
		if (!empty($inputs['referred'])){
			 $user->referred = $inputs['referred'];
		}


		if($inputs['password'])
		{
			$user->password= bcrypt($inputs['password']);
		}



	    $user->save();

		if(empty($nuevo)){

            \Session::flash('flash_message', 'Cambios Guardados');
            return \Redirect::back();
        }else{
					$response = Password::sendResetLink($request->only('email'), function (Message $message) {
							$message->subject('Contraseña de Mir Colombia');
					$message->sender(getcong('site_email'));
					});
					 \Session::flash('flash_message', 'Añadido');
          return \Redirect::back();

        }


    }

    public function editUser($id)
    {
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

          $user = User::findOrFail($id);

					$ladrillos = Transaction::where('user_id','=',$user->id)->where('status','=','1')->where('type','=','1')->sum('cantidad');


					//$transacciones = Transaction::where('user_id','=',$user->id)->where('status','=','1')->where('type','!=','1')->get();

					$transacciones = Transaction::where('user_id','=',$user->id)->where('status','=','1')->get();


          $city_list = City::orderBy('city_name')->get();

          return view('admin.pages.addeditUser',compact('user','city_list','ladrillos','transacciones'));

    }

    public function delete($id)
    {

    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

        $user = User::findOrFail($id);

		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-b.jpg');
		\File::delete(public_path() .'/upload/members/'.$user->image_icon.'-s.jpg');

		$user->delete();

        \Session::flash('flash_message', 'Eliminado');

        return redirect()->back();

    }


		public function exportUser($id) {

			if(Auth::User()->usertype!="Admin"){

					Session::flash('flash_message', 'Access denied!');

					return redirect('admin/dashboard');

			}

		$user = User::select('name as NOMBRE', 'usertype as TIPO', 'email AS EMAIL','phone as TELÉFONO','address as DIRECCIÓN','city as CIUDAD','created_at as INGRESO','referred as REFERIDO','status as ESTATUS')->where('id','=',$id)->get();
    $transactions = Transaction::select('id as TRANSACCION','titulo as TITULO','status as ESTATUS','bricks as LADRILLOS','date as FECHA','type as TIPO','origen as ORIGEN','packages_id as PAQUETES-IDENTIFICADOR','comision as COMISION')->where('user_id','=',$id)->get();
     Excel::create($id, function($excel) use($user ,$transactions) {
     $excel->sheet('Datos y Transacciones', function($sheet) use($user , $transactions) {

			$sheet->setBorder('A2:H2','thin');

			$sheet->cells('A1:I1',function($cells){
				  $cells->setBackground('#000000');
					$cells->setFontColor('#FFFFFF');
					$cells->setalignment('center');
					$cells->setValignment('middle');

			});
			$sheet->cells('A2:I2',function($cells){
					$cells->setalignment('center');
					$cells->setValignment('middle');

			});

			$sheet->cells('A3:I3',function($cells){
				  $cells->setBackground('#0B2161');
					$cells->setFontColor('#E3F6CE');
					$cells->setalignment('center');
					$cells->setValignment('middle');

			});

      $sheet->fromArray($user);
			$sheet->fromArray($transactions);
    });
     })->export('xls');


}

public function userprofile($id)
{
		if(Auth::User()->usertype!="Admin"){

				\Session::flash('flash_message', 'Access denied!');

				return redirect('admin/dashboard');

		}

			$user = User::findOrFail($id);

			$ladrillos = Transaction::where('user_id','=',$user->id)->where('status','=','1')->where('type','<>','2')->where('type', '<>', '3')->where('type', '<>', '4')->sum('cantidad');
      $comisiones = Transaction::where('user_id','=',$user->id)->where('type','>','4')->get();

			$comisiones_sumatoria =Transaction::where('user_id','=',$user->id)->where('type','>','4')->sum('cantidad');

			//$transacciones = Transaction::where('user_id','=',$user->id)->where('status','=','1')->where('type','!=','1')->get();
			$transacciones = Transaction::where('user_id','=',$user->id)->where('type','<','5')->get();

      $bought_bricks = Transaction::where('user_id','=',$user->id)->where('type','<','5')->where('status','=','1')->sum('cantidad');

			if(empty($bought_bricks)){
				$bought_bricks = 0.00;
			}
			if(empty($ladrillos)){
				$ladrillos = 0.00;
			}
			if(empty($comisiones_sumatoria)){
				$comisiones_sumatoria = 0.00;
			}

			$city_list = City::orderBy('city_name')->get();

			$allcredits = DB::table('credits')
					->join('user_credits', 'credits.id', '=', 'user_credits.credit_id')
					->select('credits.*')->where('user_credits.user_id',$id)
					->get();


			return view('admin.pages.userprofile',compact('user','city_list','ladrillos','transacciones','allcredits','comisiones','comisiones_sumatoria','bought_bricks'));

}

public function commission($id){

	 $tipos = Brickstipes::where('id','>','4')->get();
	 $user = User::findOrFail($id);
		return view('admin.pages.addcommission',compact('tipos','user'));
	}



	public function addCommission(Request $request ,$id){

		$data =  \Input::except(array('_token'));
		$inputs = $request->all();

		$commission = new Transaction;
		$commission->user_id = $id;
		$commission->titulo= $inputs['titulo'];
		$commission->status = 1;
		$commission->bricks = '-';
		$commission->type = $inputs['tipo'];
		$commission->packages_id = 0;
		$commission->cantidad = $inputs['cantidad'];
		$commission->save();

			\Session::flash('flash_message', 'Comisión Agregada');
			return \Redirect::back();

	}


	public function deletetransaccion($id)
	{

		if(Auth::User()->usertype!="Admin"){

					\Session::flash('flash_message', 'Access denied!');

					return redirect('admin/dashboard');

			}

			$transaccion = Transaction::where('id','=',$id);
			$transaccion->delete();

			\Session::flash('flash_message', 'Transacción eliminada');

			return redirect()->back();

	}

}
