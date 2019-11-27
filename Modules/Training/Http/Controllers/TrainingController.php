<?php

namespace Modules\Training\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Training;
use File;
use Session;
use Auth;
use DB;
class TrainingController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('training.create').'">Training Create</a></li>';
           $data['menu_active']='training';
           $data['submenu_active']='add';
          return view('training::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'title'      =>'required',  
    'icon'        =>'required',
    'description' =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg',
    
           ];
        $messages =[
            'title.required' =>'Title is Required',
            'icon.required'   =>'Icon Name Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 6000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('training/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $training['title']    =$request->get('title');
         $training['icon']    =$request->get('icon');
         $training['description']    =$request->get('description');         
         $training['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $training['image']=$image_filename;
        if(Training::create($training)){
              if($request->input('submit&create')){
               return redirect('training/create')->with('success_msg','Training Created Successfully!!');
        }   
     }else{
        return redirect('training/create')->with('error_msg','Training Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('training.list').'">Training List</a></li>';
          $data['training']=Training::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='training';
          $data['submenu_active']='list';
        return view('training::traininglist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('training/edit/'.$id).'">Training Edit</a></li>';
          $data['menu_active']='training';
          $data['submenu_active']='edit';
          $data['training'] =Training::find($id);
          return view('training::trainingedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'title'          =>'required',
            'icon'       =>'required',
            'description' =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:10000',
            
             ];
        $messages =[
            'title.required'   =>'Title Name is required',
            'icon.required'  =>'Icon Name Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 5000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('training/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_training_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $training['image']=$image_filename;  
            }else{
              $training['image']=$request->input('old_training_image');
            }
         $training['title']    =$request->get('title');  
         $training['icon']=$request->get('icon');
         $training['description']=$request->get('description');
         $training['updated_by'] =Auth::user()->id;
        if(Training::find($request->get('training_id'))->update($training)){
              if($request->input('submit&update')){
               return redirect('training/list')->with('success_msg','Training Updated Successfully!!');
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
        if(Training::find($id)->update($data)){
            return redirect('training/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
}
