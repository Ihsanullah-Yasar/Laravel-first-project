<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// routes/web.php



/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/


Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Route::get('/home',[MainController::class,'index']);
    Route::controller(AdminController::class)->group(function () {
        // my custome routes
        
        // Route::get('admin/blogCategory/create',[AdminController::class,'viewProduct']);
        // viewProductCategory createProductCategory
        // brands resource controller    brands/create
        // tags resource controller tags/create
    
    });
    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale(),
    //         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //     ], function(){ 
    //         Route::get('/home',[MainController::class,'index']);
    //     });

    Route::group(['prefix' => LaravelLocalization::setLocale(),
             'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
            ], function()
    {
        
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        // Route::get('/home',[MainController::class,'index']);
        Route::get('/home',[MainController::class,'index']);
        Route::get('admin',[AdminController::class,'index']);
        Route::get('admin/viewProduct',[AdminController::class,'viewProduct']);
        Route::get('admin/insertProduct',[AdminController::class,'createProduct']);
        Route::resource('shop',ProductController::class);
        // Route::get('add_tags',[ProductController::class,'Add_Tags']);
        // Route::get('pageProduct/{id}',[ProductController::class,'pagenateMethod']);
        // Route::get('admin/viewUsers',[AdminController::class,'viewUsers']);
        Route::get('admin/viewBlog',[AdminController::class,'viewBlog']);
        Route::get('admin/createBlog',[AdminController::class,'createBlog']);
        Route::get('admin/createUsers',[AdminController::class,'createUsers']);
        Route::post('admin/insertUsers',[AdminController::class,'insertUser']);
        Route::resource('admin/register',AdminRegisterController::class);
        Route::resource('blog',BlogController::class);
        Route::resource('admin/productCategory',CategoriesController::class);
        Route::resource('tags',TagsController::class);
        Route::resource('brands',BrandController::class);
        Route::resource('productCategory',CategoriesController::class);
        Route::resource('blogCategory',BlogCategoryController::class);
        Route::resource('contact',ContactController::class);
        // Route::get('/', function()
        // {

        //     return View::make('hello');
        // });

        // Route::get('test',function(){
        //     return View::make('test');
        // });
    });
});

require __DIR__.'/auth.php';
