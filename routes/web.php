<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminwebController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\BannerController;
use App\Http\Controllers\Auth\CkeditorController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\FilesController;
use App\Http\Controllers\Auth\NewsLetterController;
use App\Http\Controllers\Auth\PostAboutController;
use App\Http\Controllers\Auth\ServiceController;
use App\Http\Controllers\Auth\SubAboutController;
use App\Http\Controllers\DataAboutController;
use App\Http\Controllers\MenuServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('website.index');
// });

Route::get('/', [WebsiteController::class, 'show'])->name('home');
// Route::get('/', [WebsiteController::class, 'navmenu'])->name('navmenu');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('website.posts.show');
Route::get('/postabouts/{id}', [PostAboutController::class, 'show'])->name('website.postabouts.show');
Route::get('/subabouts/{id}', [SubAboutController::class, 'show'])->name('website.subabouts.show');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('website.services.show');
Route::get('/postsall/{id}', [PostController::class, 'showall'])->name('website.postsall.show');
Route::get('/newsletter', [NewsLetterController::class, 'showtotal'])->name('website.newsletter.show');
Route::get('/servicesall', [ServiceController::class, 'showall'])->name('website.servicesall.show');

Route::get('/post', function () {
    return view('website.posts.index');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

 

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('/auth/posts', PostController::class);
    Route::resource('/auth/banner', BannerController::class);
    Route::resource('/auth/postabouts', PostAboutController::class);
    Route::resource('/auth/subabouts', SubAboutController::class);
    Route::resource('/auth/services', ServiceController::class);
    Route::resource('/auth/files', FilesController::class);
    Route::resource('/auth/newsletter', NewsLetterController::class);

    // Route::get('/auth/editor', [CkeditorController::class, 'index'])->name('editor.index');
    // Route::post('/auth/editor', [CkeditorController::class, 'store'])->name('editor.store');
    // Route::post('/auth/editor/imge_upload', [CkeditorController::class, 'upload'])->name('editor.upload');

 

  
    // Route::get('/auth/services', [ServiceController::class, 'upload'])->name('services.upload');
    Route::get('/auth/adminweb', [AdminwebController::class, 'index'])->name('adminweb');
    // Route::get('/auth/adminweb/{id}', [AdminwebController::class, 'edit'])->name('adminweb.edit');
    

   // Route::resource('/auth/subabouts/{id}', [SubAboutController::class, 'createsub']);


   
   // Route::get('/about', [DataAboutController::class, 'index'])->name('about');
   // Route::get('/service', [MenuServiceController::class, 'index'])->name('service');
   // Route::get('/banner', [BannerController::class, 'index'])->name('banner');

    //Route::get('/auth/postabouts/submenu', [SubAboutController::class, 'createsub'])->name('createsub');
    

});



require __DIR__.'/auth.php';
