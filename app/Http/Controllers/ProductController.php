<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request)
    {
  
        
        $image = $request->file('image_namee');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $request->file('image_namee')->move($destinationPath, $imageName);
        

        $product = new Product;
        $product->category_id = $request->input('category_id');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image_name = $imageName;
        $product->slug = str_replace(' ','-',$request->input('slug'));
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
     
       
        $product->save();
       
        Alert::success('Form Submited', 'product created Successfully');

          return redirect()->route('admin-repair');
       
    }
    public function update(Request $request, $id) {
           if($request->file('image_namee')){
            $image = $request->file('image_namee');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
           $request->file('image_namee')->move($destinationPath, $imageName);
          
            DB::table('categories')->where('id', $id)->update(['image_name' => $imageName]);

           }
     
        $product = Product::find($id);
      
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->slug = str_replace(' ','-',$request->input('slug'));
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->save();
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-repair');
      }

      public function destroy($id)
      {
         
          $product = Product::find($id);
  
          if (!$product) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-repair');
          }
  
          $product->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-repair');
      }
      public function showById($slug){
        $subcategory = Category::where('slug', $slug)->firstOrFail();
        
        $cate = Category::find($subcategory->id);
        $categories = \App\Models\Category::latest()->get();


       $products =$cate->products;
       $comments = \App\Models\Rating::latest()->get();
       $services = \App\Models\AdminForm::latest()->get();
        $issues = \App\Models\Issue::latest()->get();
        $iphone_issues = \App\Models\IphoneIssue::latest()->get();
        $comments = \App\Models\Rating::latest()->get();
        $categories = \App\Models\Category::latest()->get();
        $tcategories = \App\Models\Tcategory::latest()->get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       return view('service-center',compact('products','comments','services','subcategory','categories','info','tcategories',));

      }
}
