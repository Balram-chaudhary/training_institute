<?php

namespace Modules\Achivement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Achivement;
use File;
use Session;
use Auth;
use DB;
class AchivementController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('achivement.create').'">Achivement Create</a></li>';
           $data['menu_active']='achivement';
           $data['submenu_active']='add';
          return view('achivement::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'title'        =>'required',
    'icon'       =>'required',
    'number' =>'required'
    
           ];
        $messages =[
            'title.required'   =>'Title Is Required',
            'icon.required'  =>'Icon Is Required',
            'number.required'=>'Number Is Required' 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('achivement/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $achivement['title']    =$request->get('title'); 
         $achivement['icon']    =$request->get('icon');
         $achivement['number']    =$request->get('number');         
         $achivement['created_by'] =Auth::user()->id;
        if(Achivement::create($achivement)){
              if($request->input('submit&create')){
               return redirect('achivement/create')->with('success_msg','Achivement Created Successfully!!');
        }   
     }else{
        return redirect('achivement/create')->with('error_msg','Achivement Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('achivement.list').'">Achivement List</a></li>';
          $data['achivement']=Achivement::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='services';
          $data['submenu_active']='list';
        return view('achivement::achivementlist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('achivement/edit/'.$id).'">Slider Edit</a></li>';
          $data['menu_active']='achivement';
          $data['submenu_active']='edit';
          $data['achivement'] =Achivement::find($id);
          return view('achivement::achivementedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'title'       =>'required',
            'icon'       =>'required',
            'number' =>'required'
            
             ];
        $messages =[
            'name.required'   =>' Name is required',
            'icon.required'  =>'Icon name Is Required',
            'number.required'=>'Number Is Required', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('achivement/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }

         $achivement['title']=$request->get('title');
         $achivement['icon']=$request->get('icon');
         $achivement['number']=$request->get('number');
         $achivement['updated_by'] =Auth::user()->id;
        if(Achivement::find($request->get('achivement_id'))->update($achivement)){
              if($request->input('submit&update')){
               return redirect('achivement/list')->with('success_msg','Achivement Updated Successfully!!');
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
        if(Achivement::find($id)->update($data)){
            return redirect('achivement/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
   
}
