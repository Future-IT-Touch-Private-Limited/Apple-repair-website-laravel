<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminForm;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AdminFormController extends Controller
{
    public function store(Request $request)
    {
        $form = new AdminForm;

         $image = $request->file('images');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

      $destinationPath = public_path('/images');
      $request->file('images')->move($destinationPath, $imageName);

        $form->images = $imageName;
        $form->title = $request->input('title');
        $form->description = $request->input('description');
        $form->save();
        Alert::success('Form Submited', 'Service created Successfully');

          return redirect()->route('admin-table');
       
    }
    public function destroy($id)
    {
       
        $service = AdminForm::find($id);

        if (!$service) {
            Alert::error('Error', 'This Row Not Found');
            return redirect()->route('admin-table');
        }

        $service->delete();

        Alert::success('Success', 'Deleted Successfully');

        return redirect()->route('admin-table');
    }
  
    public function update(Request $request, $id) {
        $service = AdminForm::find($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        
         if($request->file('images')){
            $image = $request->file('images');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

      $destinationPath = public_path('/images');
      $request->file('images')->move($destinationPath, $imageName);
      $service->images = $imageName;
           }
     
      
       

         
        $service->save();
        Alert::success('Success', 'updated Successfully');

        return redirect()->route('admin-table');
      }



       public function settings(Request $request, $id) {
        $service = AdminForm::find($id);
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->save();
        Alert::success('Success', 'updated Successfully');

        return redirect()->route('admin-table');
      }

           
            
}
