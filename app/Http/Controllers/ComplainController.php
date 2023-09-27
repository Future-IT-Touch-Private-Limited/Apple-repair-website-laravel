<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Tcomplains;
use App\Models\settings;
use RealRashid\SweetAlert\Facades\Alert;

class ComplainController extends Controller
{
   public function store(Request $req){
    $mobile_type=$req->mobile_type;
    $model=$req->model;
  
    $validatedData = $req->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|numeric',
       
        'issue' => 'required|string|max:400',
        'issue_details' => 'required|string|max:1000',
        'contract_agreement'=>'required'
    ]);
    $validatedData['mobile_type']=$mobile_type;
    $validatedData['model']=$model;
  $data=Complain::create($validatedData);
  Alert::success('Form Submited', 'Callback Requested Successfully');
  
  
   $data=Settings::first();
 
  
    $content =  str_replace('"','',str_replace('{',' ',str_replace(',','<br />',json_encode($validatedData))));
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  
  
  
  mail($data->email,"Lead of appyplanet services",$content,$headers);
  
  return redirect()->route('index');


  


    
   }
   
   
 
   public function tstore(Request $request){
       
        $tcomplains = new Tcomplains;
        $tcomplains->name = $request->input('name');
        $tcomplains->email = $request->input('email');
        $tcomplains->phone = $request->input('phone');
        $tcomplains->location = $request->input('location');
        $tcomplains->course = $request->input('course');
     
       
        $tcomplains->save();
      
    if($tcomplains){
        $back = 'ok';
    }
    $back = 'not';
  Alert::success('Form Submited', 'Callback Requested Successfully');
  
   $content =  str_replace('"','',str_replace('{',' ',str_replace(',','<br />',json_encode($tcomplains))));
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $data=Settings::first();
  
  mail($data->email,"Lead of appyplanet services",$content,$headers);
  
  return redirect()->back()->with(['data', $back]);


  


    
   }
}
