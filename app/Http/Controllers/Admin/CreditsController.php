<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Credit;
use App\City;
use Carbon\Carbon;
use App\Usercredits;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class CreditsController extends MainAdminController{

    public function creditslist()    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

        $allcredits = Credit::where('id', '!=', '0')->orderBy('id')->get();


        return view('admin.pages.credits',compact('allcredits'));
    }

    public function addeditCredit(){

      $tipos = DB::table('credits_types')->get();
    		return view('admin.pages.addeditCredit')->with("tipos",$tipos);
    	}

      public function addCredit(Request $request){


        $data =  \Input::except(array('_token')) ;

        $inputs = $request->all();

        $rule=array(
              'title' => 'required','price' => 'required'
             );

         $validator = \Validator::make($data,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $credit = Credit::findOrFail($inputs['id']);

              }else{

                  $credit = new Credit();

          }

          $featured_image = $request->file('featured_image');

              if($featured_image){

            \File::delete(public_path() .'/upload/properties/'.$credit->featured_image.'-b.png');
            \File::delete(public_path() .'/upload/properties/'.$credit->featured_image.'-s.jpg');


                  $tmpFilePath = 'upload/properties/';

                  $hardPath =  str_slug($inputs['title'], '-').'-'.md5(rand(0,99999));

                  $image = Image::make($featured_image);

                  $image->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
                  $image->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                  $credit->image = $hardPath;

              }






          $credit->title = $inputs['title'];
          $credit->description = $inputs['description'];
          $credit->price = $inputs['price'];
          $credit->type = $inputs['tipo'];
          $credit->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function editCredit($id){

        $credit = Credit::find($id);
        $tipos = DB::table('credits_types')->get();
          return view('admin.pages.editCredit')->with("tipos",$tipos)->with("credit",$credit);
        }

        public function deleteUserCredit($credit_id,$user_id)
        {

          if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('admin/dashboard');

            }

            $user_credit = Usercredits::where('credit_id','=',$credit_id)->where('user_id','=',$user_id);
            $user_credit->delete();

            \Session::flash('flash_message', 'Desasignacion exitosa');

            return redirect()->back();

        }




        public function delete($id)
        {

          if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('admin/dashboard');

            }

            $credit = Credit::findOrFail($id);



        $credit->delete();

            \Session::flash('flash_message', 'Eliminado');

            return redirect()->back();

        }

        public function credits($id)    {

            if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('admin/dashboard');

            }

            $allcredits = Credit::where('id', '!=', '0')->orderBy('id')->get();


            return view('admin.pages.assigncredits',compact('allcredits','id'));
        }

        public function new_usercredit ($user_id,$credit_id){

            $usercredit = new Usercredits;

            $usercredit->credit_id = $credit_id;
            $usercredit->user_id = $user_id;
            $usercredit->save();

            \Session::flash('flash_message', 'Crédito asignado');
            return \Redirect::back();

        }
  }
