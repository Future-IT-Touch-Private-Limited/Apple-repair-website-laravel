<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IphoneIssue;
use App\Models\Product;
use App\Models\Post;


use App\Models\Issue;

class HomeController extends Controller
{
    public function index(){
        $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       
        return view('index', compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
        
    }
    public function macbookScreenReplacement(){
        return view('services.macbook-screen-replacement');
    }
    public function macbookBatteryReplacement(){
        return view('services.macbook-battery-replacement');
    }
    
    public function macbookLogicBoardRepair(){
        return view('services.macbook-logic-board-repair');
    }
    public function macbookChargerRepair(){
        return view('services.macbook-charger-repair');
    }

    public function macbookWaterDemageRepair(){
        return view('services.macbook-not-turning-on-repair');
    } 
    public function macbookNotTurningOn(){
        return view('services.macbook-not-turning-on-repair');
    }
    public function macbookSpeakerReplacement(){
        return view('services.macbook-speaker-replacement');
    }
    public function macbookKeyboardReplacement(){
        return view('services.macbook-keyboard-replacement');
    }
    public function macbookServiceCenter(){
        return view('macbook-service-center');
    }

    public function iphoneScreenReplacement(){
        return view('services.iphone-screen-replacement');
    }
    public function iphoneBackCemraReplacement(){
        return view('services.iphone-back-glass-replacement');
    }
    public function iphoneWaterDemageReplacement(){
        return view('services.iphone-water-damage-repair');
    }
    public function iphoneBetteryReplacement(){
        return view('services.iphone-battery-replacement');
    }
    public function iphoneCemraReplacement(){
        return view('services.iphone-camera-replacement');
    }
    public function iphoneFaceIdNotWorking(){
        return view('services.iphone-face-id-not-working');
    }
    public function iphoneNotChargingRepair(){
        return view('services.iphone-not-charging-repair');
    }
    public function iphoneSpeakerOrMicReplacemant(){
        return view('services.iphone-speaker-microphone-replacement');
    }
    public function showBySlug($slug)
    {

        $issue = Issue::where('slug', $slug)->firstOrFail();
        $tcategories = \App\Models\Tcategory::get();
        $categories = \App\Models\Category::get();
        $comments = \App\Models\Rating::get();
       
        // pass the article data to the view
        return view('services.macbook', compact('issue','categories','tcategories','comments'));
       
       
    }

    public function singleService($slug)
    {

         $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
        $product = product::where('slug', $slug)->firstOrFail();
       
        // pass the article data to the view
        return view('single-service', compact('product','services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }

    
    public function  showByAppleSlug($slug)
    {
        
        
        $tcategories = \App\Models\Tcategory::get();
        $categories = \App\Models\Category::get();
        $issuee = IphoneIssue::where('slug', $slug)->firstOrFail();
        $info = \App\Models\Info::latest()->first();
        $comments = \App\Models\Rating::get();
     
        // pass the article data to the view
        return view('services.iphone', compact('issuee','categories','tcategories','info','comments'));
       
       
    }

    public function  privacy()
    {   
       $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
        
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       
        return view('privacy', compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }

     public function  terms()
    {   
       $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       
        return view('terms', compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }
    
    public function  macbookRentalService()
    {   
       $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       
        return view('macbook-rental-service', compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }
    
    
    public function  forBusiness()
    {   
       $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
       
        return view('for-business', compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }


    public function  contactUs()
    {
        $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();
        return view('contact-us',compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'));
       
       
    }

    public function blog(){

        $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();


        $post=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('blog',compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'))->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $services = \App\Models\AdminForm::get();
        $issues = \App\Models\Issue::get();
        $iphone_issues = \App\Models\IphoneIssue::get();
        $comments = \App\Models\Rating::get();
        $categories = \App\Models\Category::get();
       
        $tcategories = \App\Models\Tcategory::get();
        $header = \App\Models\Header::latest()->first();
        $info = \App\Models\Info::latest()->first();

        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('blog-detail',compact('services','issues','iphone_issues','comments','categories','tcategories','header','info'))->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    
   
}
