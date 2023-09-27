<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tcategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function store(Request $request)
    {
  
        if($request->file('image_namee')){
        $image = $request->file('image_namee');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $request->file('image_namee')->move($destinationPath, $imageName);
        $product->image_name = $imageName;
        }

        $product = new Course;
        $product->Tcategory_id = $request->input('tcategory_id');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->description2 = '';
        
     
       
        $product->save();
       
        Alert::success('Form Submited', 'product created Successfully');

          return redirect()->route('admin-training');
       
    }
    public function update(Request $request, $id) {
           if($request->file('image_namee')){
            $image = $request->file('image_namee');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

             $destinationPath = public_path('/images');
            $request->file('image_namee')->move($destinationPath, $imageName);
          
            DB::table('categories')->where('id', $id)->update(['image_name' => $imageName]);

           }
     
        $product = Course::find($id);
      
        $product->title = $request->input('title');
        $product->tcategory_id = $request->input('tcategory_id');
        $product->description = $request->input('description');
        $product->save();
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-training');
      }

      public function destroy($id)
      {
         
          $product = Course::find($id);
  
          if (!$product) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-training');
          }
  
          $product->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-training');
      }
      public function showById($id){
        
        $tcategory = Tcategory::where('slug', $id)->firstOrFail();
      
        
      
        $tcategories = \App\Models\Tcategory::latest()->get();

       $courses =$tcategory->courses;

       $services = \App\Models\AdminForm::latest()->get();
       $issues = \App\Models\Issue::latest()->get();
       $iphone_issues = \App\Models\IphoneIssue::latest()->get();
       $comments = \App\Models\Rating::latest()->get();
       $categories = \App\Models\Category::latest()->get();
       $tcategories = \App\Models\Tcategory::latest()->get();
       $header = \App\Models\Header::latest()->first();
       $info = \App\Models\Info::latest()->first();

       
       
       return view('training-page',compact('courses','tcategory','tcategories','info','categories'));

      }
      

}
