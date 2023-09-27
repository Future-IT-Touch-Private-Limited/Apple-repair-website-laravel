<?php

namespace App\Http\Controllers;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Models\AdminForm;
use App\Models\Issue;
use App\Models\Rating;
use App\Models\Complain;
use App\Models\Tcomplains;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function testimonial(){
            $comments = \App\Models\Rating::latest()->get();
        return view('admin.testimonial',compact('comments'));
    }
    
    
    public function showFormsLayouts()
{
    return view('admin.forms-layouts');
}
public function AdminShowTable()
{
    $services=AdminForm::latest()->get();
    $issues = Issue::latest()->get();
    $iphone_issues = \App\Models\IphoneIssue::latest()->get();
    $comments = \App\Models\Rating::latest()->get();
   
    return view('admin.tables-general',compact('services','issues','iphone_issues','comments'));
}
public function AdminShowRepairTable()
{
    $categories = \App\Models\Category::latest()->get();
    $products = \App\Models\Product::latest()->get();
   

    return view('admin.repair',compact('categories','products'));
}
public function AdminShowTrainingTable()
{
   
    $tcategories = \App\Models\Tcategory::latest()->get();
    $products = \App\Models\Course::latest()->get();

    return view('admin.training',compact('tcategories','products'));
}
public function AdminShowHeaderTable()
{
   
    
    $hcategories = \App\Models\Header::latest()->get();
    return view('admin.header',compact('hcategories'));
}
public function AdminShowNavBarTable()
{
   
    
    $informations = \App\Models\Info::latest()->get();
    return view('admin.navbar',compact('informations'));
}

public function AdminSettings()
{   

    $data=Settings::first();
    return view('admin.setting',compact('data'));
}

 public function settingsUpdate(Request $request){
        // return $request->all();\

        $social = array('facebook'=>array('icon'=>'ri-facebook-fill','link'=>$request['facebook']),'instagram'=>array('icon'=>'ri-instagram-fill','link'=>$request['instagram']),'youtube'=>array('icon'=>'ri-youtube-fill','link'=>$request['youtube']),'linkedin'=>array('icon'=>'ri-linkedin-box-fill','link'=>$request['linked']),'twitter'=>array('icon'=>'ri-twitter-fill','link'=>$request['twitter']));


        $this->validate($request,[
            'short_des'=>'required|string',
            'description'=>'required|string',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'homepage_about'=>'required|string',
            'homepage_story'=>'required|string',
            'goolge_link'=>'string|nullable',
            'website_title'=>'string|nullable',
            'meta_keywords'=>'string|nullable',
            'meta_description'=>'string|nullable',
            'other_phone'=>'string|nullable' 
        ]);


        $data=$request->all();
        $data['social_link']=$social;
       
        if($request->file('logo')!=null){
            $image = $request->file('logo');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('images');
            $image->move($destinationPath, $name); 
            $data['logo']=$name;
        } 


        if($request->file('photo')!=null){
            $image = $request->file('photo');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('images');
            $image->move($destinationPath, $name); 
            $data['photo']=$name;
        }
        
        if($request->file('company_photo')!=null){
            $image = $request->file('company_photo');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('images');
            $image->move($destinationPath, $name); 
            $data['company_photo']=$name;
        }
        // return $data;
        $settings=Settings::first();
        // return $settings;
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->route('settings');
    }


    public function contactData(){   

    $data=Complain::latest()->get();
    $new_data=Tcomplains::latest()->get();
    return view('admin.show-contact',compact('data','new_data'));
    }
    
    
     public function profile(){
          $profile=Auth()->user();
        return view('admin.profile',compact('profile'));
    }
    
    
    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $data['password']=Hash::make($data['password']);
        if($request->file('photo')!=null){
            $image = $request->file('photo');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('images');
            $image->move($destinationPath, $name); 
            $data['photo']=$name;
        
        }
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }
    
    
}
