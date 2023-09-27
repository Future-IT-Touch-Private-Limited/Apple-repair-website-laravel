<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Header;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class HeaderController extends Controller
{
    public function store(Request $request)
    {
  
        
        $image = $request->file('image_name');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $request->file('image_name')->move($destinationPath, $imageName);

        $product = new Header;
      
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->button_text = $request->input('button_text');
        $product->image_name = $imageName;
     
       
        $product->save();
       
        Alert::success('Form Submited', 'product created Successfully');
          return redirect()->route('admin-header-setting');
       
    }
    public function update(Request $request, $id) {
           if($request->file('image_name')){
            $image = $request->file('image_name');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
            $request->file('image_name')->move($destinationPath, $imageName);
          
            DB::table('headers')->where('id', $id)->update(['image_name' => $imageName]);
           }
     
        $product = Header::find($id);
      
        $product->title = $request->input('title');
       
        $product->description = $request->input('description');
        $product->button_text = $request->input('button_text');
        $product->save();

        Alert::success('Success', 'header updated Successfully');

        return redirect()->route('admin-header-setting');
      }

      public function destroy($id)
      {
         
          $product = Header::find($id);
  
          if (!$product) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-repair');
          }
  
          $product->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-header-setting');
      }
}
