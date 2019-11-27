<?php

namespace Modules\Courses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Course;
use File;
use Session;
use Auth;
use DB;
class CoursesController extends Controller
{
  
  public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('courses.create').'">Slider Create</a></li>';
           $data['menu_active']='courses';
           $data['submenu_active']='add';
          return view('courses::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'type'      =>'required',  
    'name'        =>'required',
    'description' =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg',
    
           ];
        $messages =[
            'type.required' =>'Courses Type is Required',
            'name.required'   =>'Slider Name Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 6000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('courses/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $courses['type']    =$request->get('type');
         $courses['name']    =$request->get('name');
         $courses['description']    =$request->get('description');         
         $courses['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $courses['image']=$image_filename;
        if(Course::create($courses)){
              if($request->input('submit&create')){
               return redirect('courses/create')->with('success_msg','Courses Created Successfully!!');
        }   
     }else{
        return redirect('courses/create')->with('error_msg','Courses Not Created');
     }
   }
 }else{
        return redirect('admin');
     }   
     
  }
  
   public function list(){
    if(Auth::user()){
          $data=[];
          $data['breadcrumbs'] ='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('courses.list').'">Slider List</a></li>';
          $data['courses']=Course::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='courses';
          $data['submenu_active']='list';
        return view('courses::courseslist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('courses/edit/'.$id).'">Courses Edit</a></li>';
          $data['menu_active']='slider';
          $data['submenu_active']='edit';
          $data['courses'] =Course::find($id);
          return view('courses::coursesedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'name'          =>'required',
            'type'       =>'required',
            'description' =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:10000',
            
             ];
        $messages =[
            'name.required'   =>'Courses Name is required',
            'type.required'  =>'Courses Type Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 5000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('courses/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_courses_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $courses['image']=$image_filename;  
            }else{
              $courses['image']=$request->input('old_courses_image');
            }
         $courses['name']    =$request->get('name');  
         $courses['type']=$request->get('type');
         $courses['description']=$request->get('description');
         $courses['updated_by'] =Auth::user()->id;
        if(Course::find($request->get('courses_id'))->update($courses)){
              if($request->input('submit&update')){
               return redirect('courses/list')->with('success_msg','Courses Updated Successfully!!');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('admin');
     }  

  
}
  public function remove($id){
    if(Auth::user()){
       $data=[];
        $data['deleted_by']=Auth::user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['del_flag']='1';
        if(Course::find($id)->update($data)){
            return redirect('courses/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
}
