<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [FrontendController::class,'login'])->name('login');
Route::post('/login', [FrontendController::class,'loginSubmit']);
Route::get('/logout',[FrontendController::class,'logout'])->name('logout');

Route::get('privacy',[HomeController::class,'privacy'])->name('privacy');
Route::get('terms',[HomeController::class,'terms'])->name('terms');
 Route::get('about-us',[AboutController::class,'index'])->name('about-us');
 Route::get('contact-us',[HomeController::class,'contactUs'])->name('contact.show');
 Route::get('/',[HomeController::class,'index'])->name('index');
 
 Route::get('/macbook-rental-service',[HomeController::class,'macbookRentalService'])->name('macbook-rental-service');
 Route::get('/for-business',[HomeController::class,'forBusiness'])->name('for-business');
  


// Blog
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[HomeController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[HomeController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[HomeController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[HomeController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[HomeController::class,'blogByTag'])->name('blog.tag');

  Route::get('single-service/{slug}',[HomeController::class,'singleService'])->name('single.service');

 Route::post('complain',[ComplainController::class,'store'])->name('complain');
 Route::post('tcomplain',[ComplainController::class,'tstore'])->name('tcomplain');
 

 Route::get('services/macbook-service-center',[HomeController::class,'macbookServiceCenter'])->name('macbook-service-center');

 



 Route::get('services/{slug}',[HomeController::class,'showBySlug'])->name('issue.show');
  Route::get('service/{slugg}',[HomeController::class,'showByAppleSlug'])->name('apple-issue.show');

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    
     Route::get('testimonial',[AdminController::class,'testimonial'])->name('testimonial');
    
     Route::get('/',[AdminController::class,'index'])->name('admin.index');
 Route::get('dashboard',[AdminController::class,'index'])->name('admin.index');
  Route::get('profile',[AdminController::class,'profile'])->name('profile');
  Route::post('/profile/{id}',[AdminController::class,'profileUpdate'])->name('profile-update');
 Route::get('forms-layouts', 'App\Http\Controllers\AdminController@showFormsLayouts')->name('forms-layouts');
 Route::get('home-pages', 'App\Http\Controllers\AdminController@AdminShowTable')->name('admin-table');
 Route::get('repair', 'App\Http\Controllers\AdminController@AdminShowRepairTable')->name('admin-repair');
 Route::get('home-silder', 'App\Http\Controllers\AdminController@AdminShowHeaderTable')->name('admin-header-setting');
 Route::get('navbar', 'App\Http\Controllers\AdminController@AdminShowNavbarTable')->name('admin-navbar');

 Route::get('training', 'App\Http\Controllers\AdminController@AdminShowTrainingTable')->name('admin-training');


 // admin add dynamic ..
 Route::post('services', 'App\Http\Controllers\AdminFormController@store')->name('sevice');
//add issues dinamically in home page
 Route::post('issue', 'App\Http\Controllers\IssueController@store')->name('issue');
Route::post('iphone-issue', 'App\Http\Controllers\IphoneIssueController@store')->name('iphone-issue');
 Route::post('rating', 'App\Http\Controllers\RatingController@store')->name('rating');
 Route::post('product-category', 'App\Http\Controllers\CategoryController@store')->name('category');
 Route::post('product', 'App\Http\Controllers\ProductController@store')->name('product');
  Route::post('training-category', 'App\Http\Controllers\TcategoryController@store')->name('tcategory');
   Route::post('navbar', 'App\Http\Controllers\InfoController@store')->name('navbar');
 Route::post('course', 'App\Http\Controllers\CourseController@store')->name('course');

 Route::post('header', 'App\Http\Controllers\HeaderController@store')->name('header');

 Route::get('settings',[AdminController::class,'AdminSettings'])->name('settings');
    Route::post('setting/update',[AdminController::class,'settingsUpdate'])->name('settings.update');

    // POST category
    Route::resource('/post-category','App\Http\Controllers\PostCategoryController');
    // Post tag
    // Route::resource('/post-tag','App\Http\Controllers\PostTagController');
    // Post
    Route::resource('/post','App\Http\Controllers\PostController');

     Route::get('/leads',[AdminController::class,'contactData'])->name('Complain');

});
 Route::delete('/service/{id}', 'App\Http\Controllers\AdminFormController@destroy')->name('service.destroy');
 Route::put('/service/{id}', 'App\Http\Controllers\AdminFormController@update')->name('service.update');




 Route::put('/issue/{id}', 'App\Http\Controllers\IssueController@update')->name('issue-update');
 Route::delete('/isue/{id}', 'App\Http\Controllers\IssueController@destroy')->name('issue.destroy');


 Route::put('/iphone-issue/{id}', 'App\Http\Controllers\IphoneIssueController@update')->name('iphone-issue-update');
 Route::delete('/iphone-issue/{id}', 'App\Http\Controllers\IphoneIssueController@destroy')->name('iphone-issue.destroy');


 Route::put('/rating/{id}', 'App\Http\Controllers\RatingController@update')->name('rating-update');
 Route::delete('/rating/{id}', 'App\Http\Controllers\RatingController@destroy')->name('rating.destroy');

 //add repair categories


 Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
 Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');
 //add products


 Route::put('/product/{id}', 'App\Http\Controllers\ProductController@update')->name('product.update');
 Route::delete('/product/{id}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');
 Route::get('/{slug}','App\Http\Controllers\ProductController@showById')->name('products.show');
 //add training categories


 Route::put('/tcategory/{id}', 'App\Http\Controllers\TcategoryController@update')->name('tcategory.update');
 Route::delete('/tcategory/{id}', 'App\Http\Controllers\TcategoryController@destroy')->name('tcategory.destroy');
 //add cources

 Route::put('/course/{id}', 'App\Http\Controllers\CourseController@update')->name('course.update');
 Route::delete('/course/{id}', 'App\Http\Controllers\CourseController@destroy')->name('course.destroy');
 Route::get('course/{id}','App\Http\Controllers\CourseController@showById')->name('tcategories.show');

 //header
 Route::get('training/{slug}','App\Http\Controllers\CourseController@showById')->name('training.show');
 Route::put('/header/{id}', 'App\Http\Controllers\HeaderController@update')->name('header.update');
 Route::delete('/header/{id}', 'App\Http\Controllers\HeaderController@destroy')->name('header.destroy');

 //Route::get('/{id}','App\Http\Controllers\CourseController@showById')->name('tcategories.show');

 Route::put('/navbar/{id}', 'App\Http\Controllers\InfoController@update')->name('navbar.update');
 Route::delete('/navbar/{id}', 'App\Http\Controllers\InfoController@destroy')->name('navbar.destroy');

