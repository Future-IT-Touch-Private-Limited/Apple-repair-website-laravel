<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
class RatingController extends Controller
{
   



    public function store(Request $request)
    {
        $image = $request->file('userImage');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        
        $destinationPath =  public_path('images');
        $image->move($destinationPath, $imageName); 
    

        $comment = new Rating;
      
        $comment->name = $request->input('name');
        
        $comment->description = $request->input('description');
        $comment->stars = $request->input('stars');
        $comment->image_name = $imageName;
       
        $comment->save();
        Alert::success('Form Submited', 'Issue created Successfully');

          return redirect()->route('admin-table');
       
    }
    public function update(Request $request, $id) {
        $comment = Rating::find($id);
        
        if($request->file('userImage')!=null){
            $image = $request->file('userImage');
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('images');
            $image->move($destinationPath, $name); 
        } 

        
        $comment->name = $request->input('name');
   
        $comment->description = $request->input('description');
       
        $comment->stars = $request->input('stars');
        
        $comment->save();
        DB::table('ratings')->where('id', $id)->update(['image_name' => $name]);
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-table');
      }

      public function destroy($id)
      {
         
          $comment = rating::find($id);
  
          if (!$comment) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-table');
          }
  
          $comment->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-table');
      }

}
