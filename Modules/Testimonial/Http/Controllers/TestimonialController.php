<?php
namespace Modules\Testimonial\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\User;
use App\Testimonial;
use File;
use Session;
use Auth;
use DB;
class TestimonialController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('testimonial.create').'">Testimonial Create</a></li>';
           $data['menu_active']='testimonial';
           $data['submenu_active']='add';
          return view('testimonial::index',$data);
     }
     if($request->isMethod('post')){
        // echo '<pre>';print_r($request->all());die();
    $rules=[
    'name'        =>'required',
    'oname'       =>'required',
    'post' =>'required',
    'images'      => 'required|mimes:jpeg,png,bmp,gif,jpg|max:5000',
    'message'       =>'required',
           ];
        $messages =[
            'name.required'   =>'Name Is Required',
            'oname.required'  =>'Organization Name Is Required',
            'post.required'=>'Post Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 5000kb',
            'message.required'=>'message Is Required',
            // 'images.dimensions'     =>'Image width may be 200 and height may be 250 ', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('testimonial/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $testimonial['name']    =$request->get('name'); 
         $testimonial['oname']    =$request->get('oname');
         $testimonial['post']    =$request->get('post'); 
         $testimonial['message']    =$request->get('message');         
         $testimonial['created_by'] =Auth::user()->id;
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            
         }
         $testimonial['image']=$image_filename;
        if(Testimonial::create($testimonial)){
              if($request->input('submit&create')){
               return redirect('testimonial/create')->with('success_msg','Testimonial Created Successfully!!');
        }   
     }else{
        return redirect('testimonial/create')->with('error_msg','Testimonial Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('testimonial.list').'">Testimonial List</a></li>';
          $data['testimonial']=Testimonial::where('del_flag','=','0')->paginate(30);
          $data['menu_active']='testimonial';
          $data['submenu_active']='list';
        return view('testimonial::testimoniallist',$data);
        }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request ,$id){
        if(Auth::user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('testimonial/edit/'.$id).'">Testimonial Edit</a></li>';
          $data['menu_active']='testimonial';
          $data['submenu_active']='edit';
          $data['testimonial'] =Testimonial::find($id);
          return view('testimonial::testimonialedit',$data);
     }
    if($request->isMethod('post')){
        $rules=[
            'name'        =>'required',
            'oname'       =>'required',
            'post' =>'required',
            'images'      => 'mimes:jpeg,png,bmp,gif,jpg|max:5000',
            'message'       =>'required',
             ];
        $messages =[
            'name.required'   =>'Name Is Required',
            'oname.required'  =>'Organization Name Is Required',
            'post.required'=>'Post Is Required',
            'images.mimes'  => 'Image Format May Be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image Size Not Exceed To Be 5000kb',
            'message.required'=>'message Is Required', 
            ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('slider/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->hasFile('images')){
              File::delete(public_path('/images/').$request->input('old_testimonial_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $testimonial['image']=$image_filename;  
            }else{
                $testimonial['image']=$request->input('old_testimonial_image');
            }
         $testimonial['name']    =$request->get('name');  
          
         $testimonial['oname']=$request->get('oname');
         $testimonial['post']=$request->get('post');
         $testimonial['message']=$request->get('message');
         $testimonial['updated_by'] =Auth::user()->id;
        if(Testimonial::find($request->get('testimonial_id'))->update($testimonial)){
              if($request->input('submit&update')){
               return redirect('testimonial/list')->with('success_msg','Testimonial Updated Successfully!!');
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
        if(Testimonial::find($id)->update($data)){
            return redirect('testimonial/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }
  
    
}
