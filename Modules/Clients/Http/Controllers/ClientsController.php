<?php

namespace Modules\Clients\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Clients;
use File;
use Session;
use Auth;
use DB;
class ClientsController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('clients.create').'">Clients Create</a></li>';
           $data['menu_active']='clients';
           $data['submenu_active']='add';
          return view('clients::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'name'        =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg',
    
           ];
        $messages =[
            'name.required'   =>'Client Name Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 6000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('clients/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $clients['name']    =$request->get('name');          
         $clients['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $clients['image']=$image_filename;
        if(Clients::create($clients)){
              if($request->input('submit&create')){
               return redirect('clients/create')->with('success_msg','Client Created Successfully!!');
        }   
     }else{
        return redirect('clients/create')->with('error_msg','Clients Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('clients.list').'">Clients List</a></li>';
          $data['clients']=Clients::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='clients';
          $data['submenu_active']='list';
        return view('clients::clientslist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('clients/edit/'.$id).'">Clients Edit</a></li>';
          $data['menu_active']='clients';
          $data['submenu_active']='edit';
          $data['clients'] =Clients::find($id);
          return view('clients::clientsedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'name'          =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:10000',
            
             ];
        $messages =[
            'name.required'   =>'Gallery Name is required',
            'images.mimes'  => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 5000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('clients/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_clients_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $clients['image']=$image_filename;  
            }else{
              $clients['image']=$request->input('old_clients_image');
            }
         $clients['name']    =$request->get('name');  
         $clients['updated_by'] =Auth::user()->id;
        if(Clients::find($request->get('clients_id'))->update($clients)){
              if($request->input('submit&update')){
               return redirect('clients/list')->with('success_msg','Clients Updated Successfully!!');
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
        if(Clients::find($id)->update($data)){
            return redirect('clients/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
  
}
