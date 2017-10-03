<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Types;
use App\Bricks;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class BricksController extends MainAdminController
{

    public function brickslist()
    {

    	$bricks = Bricks::all();
        return view('admin.pages.bricks')->with("bricks",$bricks);
    }

    public function addeditbricks(){

      $tipos = DB::table('bricks_types')->get();
    		return view('admin.pages.addeditbricks')->with("tipos",$tipos);
    	}

      public function edit($id){

        $brick = Bricks::find($id);
        $tipos = DB::table('bricks_types')->get();
          return view('admin.pages.edit')->with("tipos",$tipos)->with("brick",$brick);
        }

        public function editar(){
          dd("aslkjdlaksjdkasd");
        }



    public function addproduct(Request $request){


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

                $bricks = Bricks::findOrFail($inputs['id']);

            }else{

                $bricks = new Bricks();

        }

        $featured_image = $request->file('featured_image');

            if($featured_image){

          \File::delete(public_path() .'/upload/properties/'.$bricks->featured_image.'-b.png');
    			\File::delete(public_path() .'/upload/properties/'.$bricks->featured_image.'-s.jpg');


                $tmpFilePath = 'upload/properties/';

                $hardPath =  str_slug($inputs['title'], '-').'-'.md5(rand(0,99999));

                $img = Image::make($featured_image);

                $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
    			      $img->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                $bricks->img = $hardPath;

            }






        $bricks->title = $inputs['title'];
        $bricks->description = $inputs['description'];
        $bricks->price = $inputs['price'];
        $bricks->tipo = $inputs['tipo'];
        $bricks->cantidad = $inputs['cantidad'];
        $bricks->save();
        \Session::flash('flash_message', 'Cambios Guardados');
        return \Redirect::back();

    }
    public function delete($id)
    {

      if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

        $bricks = Bricks::findOrFail($id);



    $bricks->delete();

        \Session::flash('flash_message', 'Eliminado');

        return redirect()->back();

    }



}
