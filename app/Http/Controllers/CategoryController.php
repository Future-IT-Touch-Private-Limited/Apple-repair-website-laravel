<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    public function store(Request $request)
    {
      

      $image = $request->file('image_namee');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

      $destinationPath = public_path('/images');
      $request->file('image_namee')->move($destinationPath, $imageName);

        

        $category = new Category;
        $category->products_name = $request->input('product_name');
        $category->title = $request->input('title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->description = $request->input('description');
        $category->slug = $request->input('slug');
        $category->image_name = $imageName;
     
       
        $category->save();
       
        Alert::success('Form Submited', 'Category created Successfully');

          return redirect()->route('admin-repair');
       
    }
    public function update(Request $request, $id) {
           if($request->file('image_namee')){
            $image = $request->file('image_namee');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image = $request->file('image_namee');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

      $destinationPath = public_path('/images');
      $request->file('image_namee')->move($destinationPath, $imageName);

      
            DB::table('categories')->where('id', $id)->update(['image_name' => $imageName]);

           }
     
        $category = Category::find($id);
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->products_name = $request->input('product_name');
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->slug = $request->input('slug');
        $category->save();
      
      
       
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-repair');
      }

      public function destroy($id)
      {
         
          $category = Category::find($id);
  
          if (!$category) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-repair');
          }
  
          $category->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-repair');
      }

}
