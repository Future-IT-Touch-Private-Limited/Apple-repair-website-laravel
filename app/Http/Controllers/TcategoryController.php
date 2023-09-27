<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tcategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class TcategoryController extends Controller
{
   
    public function store(Request $request)
    {
     
        $image = $request->file('image_namee');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $request->file('image_namee')->move($destinationPath, $imageName);
        
        

        $category = new Tcategory;
        $category->course_name = $request->input('course_name');
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->image_name = $imageName;
        $category->slug = str_replace(' ','-',$request->input('title'));
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
     
       
        $category->save();
       
        Alert::success('Form Submited', 'Category created Successfully');

          return redirect()->route('admin-training');
       
    }
    public function update(Request $request, $id) {
               
                $category = TCategory::find($id);
                
           if($request->file('image_namee')!=null){
            $image = $request->file('image_namee');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $request->file('image_namee')->move($destinationPath, $imageName);
             $category->image_name = $imageName;

           }
     

      
        $category->course_name = $request->input('course_name');
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->slug = str_replace(' ','-',$request->input('title'));
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->save();
      
       
    
              
        
    
   
      
        
      
       
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-training');
      }

      public function destroy($id)
      {
         
          $category = Tcategory::find($id);
  
          if (!$category) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-repair');
          }
  
          $category->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-training');
      }
}
