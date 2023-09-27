<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   public function index(){
      $services = \App\Models\AdminForm::get();
      $issues = \App\Models\Issue::get();
      $iphone_issues = \App\Models\IphoneIssue::get();
      $comments = \App\Models\Rating::get();
      $categories = \App\Models\Category::get();
      $products = \App\Models\Category::get();
      $tcategories = \App\Models\Tcategory::get();
      $header = \App\Models\Header::latest()->first();
      $info = \App\Models\Info::latest()->first();
   return view('about-us',compact('categories','info','tcategories','products'));
   }
}
