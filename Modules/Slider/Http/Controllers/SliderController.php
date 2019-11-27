<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Slider;
use File;
use Session;
use Auth;
use DB;
class SliderController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('slider.create').'">Slider Create</a></li>';
           $data['menu_active']='slider';
           $data['submenu_active']='add';
          return view('slider::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'name'        =>'required',
    'ftitle'       =>'required',
    'stitle'       =>'required',
    'description' =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg',
    
           ];
        $messages =[
            'name.required'   =>'Slider Name Is Required',
            'ftitle.required'  =>'Slider First Title Is Required',
            'stitle.required'  =>'Slider Second Title Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            // 'images.size'     =>'Image Size Not Exceed To Be 6000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('slider/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $slider['name']    =$request->get('name'); 
         $slider['first_title']    =$request->get('ftitle');
         $slider['second_title']    =$request->get('stitle');
         $slider['description']    =$request->get('description');         
         $slider['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $slider['image']=$image_filename;
        if(Slider::create($slider)){
              if($request->input('submit&create')){
               return redirect('slider/create')->with('success_msg','Slider Created Successfully!!');
        }   
     }else{
        return redirect('slider/create')->with('error_msg','Slider Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('slider.list').'">Slider List</a></li>';
          $data['slider']=Slider::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='slider';
          $data['submenu_active']='list';
        return view('slider::sliderlist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('slider/edit/'.$id).'">Slider Edit</a></li>';
          $data['menu_active']='slider';
          $data['submenu_active']='edit';
          $data['slider'] =Slider::find($id);
          return view('slider::slideredit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'name'          =>'required',
            'ftitle'       =>'required',
            'stitle'       =>'required',
            'description' =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:10000',
            
             ];
        $messages =[
            'name.required'   =>'Slider Name is required',
            'ftitle.required'  =>'Slider First Title Is Required',
            'stitle.required'  =>'Slider Second Title Is Required',
            'description.required'=>'Description Is Required',
            'images.mimes'  => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 5000kb',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('slider/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_slider_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $slider['image']=$image_filename;  
            }else{
              $slider['image']=$request->input('old_slider_image');
            }
         $slider['name']    =$request->get('name');  
         $slider['first_title']=$request->get('ftitle');
         $slider['second_title']=$request->get('stitle');
         $slider['description']=$request->get('description');
         $slider['updated_by'] =Auth::user()->id;
        if(Slider::find($request->get('slider_id'))->update($slider)){
              if($request->input('submit&update')){
               return redirect('slider/list')->with('success_msg','Slider Updated Successfully!!');
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
        if(Slider::find($id)->update($data)){
            return redirect('slider/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
    
}
