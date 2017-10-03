<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Project;
use App\Projects_status;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class ProjectsController extends MainAdminController{

    public function projectslist()    {

        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');

        }

        $allprojects = Project::where('id', '!=', '0')->orderBy('id')->get();


        return view('admin.pages.projects',compact('allprojects'));
    }

    public function addeditProject(){

      $tipos = DB::table('projects_status')->get();
    		return view('admin.pages.addeditProject')->with("tipos",$tipos);
    	}

      public function addProject(Request $request){


        $data =  \Input::except(array('_token')) ;

        $inputs = $request->all();

        $rule=array(
              'title' => 'required'
             );

         $validator = \Validator::make($data,$rule);

          if ($validator->fails())
          {
                  return redirect()->back()->withErrors($validator->messages());
          }


          if(!empty($inputs['id'])){

                  $project = Project::findOrFail($inputs['id']);

              }else{

                  $project = new Project();

          }

          $featured_image = $request->file('featured_image');

              if($featured_image){

            \File::delete(public_path() .'/upload/properties/'.$project->featured_image.'-b.png');
            \File::delete(public_path() .'/upload/properties/'.$project->featured_image.'-s.jpg');


                  $tmpFilePath = 'upload/properties/';

                  $hardPath =  str_slug($inputs['title'], '-').'-'.md5(rand(0,99999));

                  $image = Image::make($featured_image);

                  $image->fit(600, 600)->save($tmpFilePath.$hardPath.'-b.png');
                  $image->fit(600, 600)->save($tmpFilePath.$hardPath.'-s.jpg');

                  $project->image = $hardPath;

              }






          $project->title = $inputs['title'];
          $project->description = $inputs['description'];
          $project->status = $inputs['tipo'];
          $project->save();
          \Session::flash('flash_message', 'Cambios Guardados');
          return \Redirect::back();

      }

      public function editProject($id){

        $project = Project::find($id);
        $tipos = DB::table('projects_status')->get();
          return view('admin.pages.editProject')->with("tipos",$tipos)->with("project",$project);
        }


        public function delete($id)
        {

          if(Auth::User()->usertype!="Admin"){

                \Session::flash('flash_message', 'Access denied!');

                return redirect('admin/dashboard');

            }

            $project= Project::findOrFail($id);



        $project->delete();

            \Session::flash('flash_message', 'Eliminado');

            return redirect()->back();

        }

  }
