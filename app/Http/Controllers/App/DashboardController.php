<?php

namespace App\Http\Controllers\App;

use Auth;
use App\User;
use App\Network;
use App\Credit;
use App\Transaction;
use Baum\Node;
use App\Usercredits;
use App\Properties;
use App\Enquire;
use App\Partners;
use App\Subscriber;
use App\Testimonials;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Project;
use App\Projects_status;
use Carbon\Carbon;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;


class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');

    }
    public function index()
    {
			  return view('app.pages.dashboard');
		}

		public function pqrs_page()
    {
        return view('app.pages.contact');
    }

    public function pqrs_sendemail(Request $request)
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


		public function projectslist()    {

				if(Auth::User()->usertype!="Owner"){

						\Session::flash('flash_message', 'Access denied!');

						return redirect('app/dashboard');

				}

				$allprojects = Project::where('id', '!=', '0')->orderBy('id')->get();


				return view('app.pages.projects',compact('allprojects'));
		}

		public function showproject($id){

			$project = Project::find($id);
				return view('app.pages.project')->with("project",$project);
			}

			public function usercredits($id) {

				$allcredits = DB::table('credits')
            ->join('user_credits', 'credits.id', '=', 'user_credits.credit_id')
            ->select('credits.*')->where('user_credits.user_id',$id)
            ->get();
					return view('app.pages.credits',compact('allcredits'));

				}

				public function showcredit($id){

					$credit = Credit::find($id);
					return view('app.pages.credit')->with("credit",$credit);
					}


					public function showcommissions($id){

						$commissions = Transaction::where('user_id','=',$id)->where('type','>','4')->get();
						$comisiones_sumatoria =Transaction::where('user_id','=',$id)->where('type','>','4')->sum('cantidad');
						if(empty($comisiones_sumatoria)){
							$comisiones_sumatoria = 0.00;
						}
						return view('app.pages.commissions',compact('commissions','comisiones_sumatoria'));

						}



				public function network($id){

           $user = User::where('id','=',$id)->first();
           $parent = Network::where('user_id','=',$id)->first();
           $descendants = $parent->descendants()->get();


           $tree = json_decode($descendants,true);
           $tree = buildTree($tree,$parent->id);
           $tree = json_encode(parse($tree,$parent));


					 return view('app.pages.network',compact('tree','user','parent'));

						}

}




//functions

function buildTree( $elements, $parentId = 0) {
		$branch = array();

		foreach ($elements as $element) {
				if ($element['parent_id'] == $parentId) {
						$children = buildTree($elements, $element['id']);

						if ($children) {
								$element['children'] = $children;
						}

						$branch[] = $element;
				}
		}

		return $branch;
}
function parse($data,$padre) {
        $temp = [];
        foreach ($data as $id => $v) {
          unset($v['parent_id']);
          unset($v['id']);
          unset($v['lft']);
          unset($v['rght']);
          unset($v['depth']);
          //unset($v['level']);
          //$array0 = array("text" => array ("name" => User::find($v['user_id'])->name));

          $html = '<div class="well" style="background-color:#424242;color:white;text-decoration: none;">';
          $html .= '<center>';
          $html .=  User::find($v['user_id'])->name;

        /*  if (count($v['children'])< 3) {
            $html .= '<a href="/admin/multinivel/team/add/'.$padre.'/'.$v['user_id'].'"';
            $html .= '<br><p style="color: #FFD700;">Añadir</p>';
              $html .= '</a>';
          }*/


          $html .= '</center>'>

          $html .= '</div>';

          $array0 = array("innerHTML" => $html);

          //$array0 = array_merge($array0,$array1);
          $v = array_merge($array0, $v);

            unset($v['user_id']);


          if (!empty($v['children'])) {
            $v['children'] = parse($v['children'],$padre);
          }else{
              unset($v['children']);
          }
          $temp[] = $v;
        }
        return $temp;
      }
