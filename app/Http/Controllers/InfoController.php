<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Info;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class InfoController extends Controller
{
    public function store(Request $request)
    {
  
        
      
        

        $product = new Info;
      
        $product->number = $request->input('number');
        $product->email = $request->input('email');
       
     
       
        $product->save();
       
        Alert::success('Form Submited', 'info created Successfully');

          return redirect()->route('admin-navbar');
       
    }
    public function update(Request $request, $id) {
          
        $product = Info::find($id);
      
        $product->number = $request->input('number');
       
        $product->email = $request->input('email');
      
        $product->save();

        Alert::success('Success', 'info updated Successfully');

        return redirect()->route('admin-navbar');
      }

      public function destroy($id)
      {
         
          $product = Info::find($id);
  
          if (!$product) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-repair');
          }
  
          $product->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-navbar');
      }
}
