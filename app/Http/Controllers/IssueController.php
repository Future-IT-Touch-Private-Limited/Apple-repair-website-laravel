<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{

    public function store(Request $request)
    {
        $image = $request->file('macbookImage');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        
        $destinationPath =  public_path('/images');
        $image->move($destinationPath, $imageName); 
       
    

        $issue = new Issue;
      
        $issue->title = $request->input('issue');
        $issue->slug = str_replace(' ','-',$request->input('slug'));
        $issue->description = $request->input('description');
        $issue->image_name = $imageName;
        $issue->meta_keywords = $request->input('meta_keywords');
        $issue->meta_description = $request->input('meta_description');
       
        $issue->save();
        Alert::success('Form Submited', 'Issue created Successfully');

          return redirect()->route('admin-table');
       
    }
    public function update(Request $request, $id) {
        $issue = Issue::find($id);

if($request->file('macbookImage')!=null){  
            $image = $request->file('macbookImage');
            $imageName = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $destinationPath =  public_path('/images');
            $image->move($destinationPath, $imageName); 
             DB::table('issues')->where('id', $id)->update(['image_name' => $imageName]);
}
       
        $issue->title = $request->input('title');
        $issue->slug = str_replace(' ','-',$request->input('slug'));
        $issue->description = $request->input('description');
         $issue->meta_keywords = $request->input('meta_keywords');
        $issue->meta_description = $request->input('meta_description');
   
        $issue->save();
       
        Alert::success('Success', 'Issue updated Successfully');

        return redirect()->route('admin-table');
      }

      public function destroy($id)
      {
         
          $issue = issue::find($id);
  
          if (!$issue) {
              Alert::error('Error', 'This Row Not Found');
              return redirect()->route('admin-table');
          }
  
          $issue->delete();
  
          Alert::success('Success', 'Deleted Successfully');
  
          return redirect()->route('admin-table');
      }

   
 
}
