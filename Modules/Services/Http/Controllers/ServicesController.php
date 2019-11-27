<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Service;
use File;
use Session;
use Auth;
use DB;
class ServicesController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('services.create').'">Services Create</a></li>';
           $data['menu_active']='services';
           $data['submenu_active']='add';
          return view('services::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'title'        =>'required',
    'icon'       =>'required',
    'description' =>'required'
    
           ];
        $messages =[
            'title.required'   =>'Service Title Is Required',
            'icon.required'  =>'Services Icon Is Required',
            'description.required'=>'Description Is Required' 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('services/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $services['title']    =$request->get('title'); 
         $services['icon']    =$request->get('icon');
         $services['description']    =$request->get('description');         
         $services['created_by'] =Auth::user()->id;
        if(Service::create($services)){
              if($request->input('submit&create')){
               return redirect('services/create')->with('success_msg','Services Created Successfully!!');
        }   
     }else{
        return redirect('services/create')->with('error_msg','Services Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('services.list').'">Services List</a></li>';
          $data['services']=Service::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='services';
          $data['submenu_active']='list';
        return view('services::serviceslist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('services/edit/'.$id).'">Services Edit</a></li>';
          $data['menu_active']='services';
          $data['submenu_active']='edit';
          $data['services'] =Service::find($id);
          return view('services::servicesedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'title'       =>'required',
            'icon'       =>'required',
            'description' =>'required'
            
             ];
        $messages =[
            'title.required'   =>'Service Title is required',
            'icon.required'  =>' Services Icon Is Required',
            'description.required'=>'Description Is Required', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('services/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }

         $services['title']=$request->get('title');
         $services['icon']=$request->get('icon');
         $services['description']=$request->get('description');
         $services['updated_by'] =Auth::user()->id;
        if(Service::find($request->get('service_id'))->update($services)){
              if($request->input('submit&update')){
               return redirect('services/list')->with('success_msg','Services Updated Successfully!!');
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
        if(Service::find($id)->update($data)){
            return redirect('services/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
    
}
