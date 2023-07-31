<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Home\HomeBannerController;
use App\Http\Controllers\Home\aboutController;
use App\Http\Controllers\Home\portfolioController;



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

Route::get('/', function () {
    return view('frontend.index');
});

//admin All controller
Route::controller(AdminController::class)->group(function (){
    Route::get('/admin_logout', 'destroy')->name('admin_logout');
    Route::get('/admin_profile', 'profile')->name('admin_profile');
    Route::get('/edit_Profile', 'editProfile')->name('editProfile');
    Route::post('/Store_Profile', 'StoreProfile')->name('Store_Profile');
    Route::get('/change_password', 'changePassword')->name('change_password');
    Route::post('/update_password', 'updatePassword')->name('update_password');
});

//frontend home Banner  route
Route::controller(HomeBannerController::class)->group(function (){
    Route::get('/home_banner', 'homeBanner')->name('home.banner');
    Route::post('/update_banner', 'UpdateBanner')->name('update.banner');


});

//frontend About  route
Route::controller(aboutController::class)->group(function (){
    Route::get('/home.about', 'about')->name('home.about');
    Route::post('/update/about', 'UpdateAbout')->name('update_about');
    Route::get('/about/multiImage/view', 'AboutMultiImage')->name('about_multiImage');
    Route::post('multi/image/submit', 'submitMultiImage')->name('multiImage.submit');
    Route::get('/all/multiImage/view', 'allMultiImage')->name('all_multiImage');
    Route::get('/edit/multiImage/view/{id}', 'editMultiImage')->name('edit_multiimage');
    Route::post('/update/multiImage/', 'updateMultiImage')->name('update_multiimage');
    Route::get('/delete/multiImage/{id}', 'deleteMultiImage')->name('delete_multiimage');
    
    Route::get('/about/details', 'aboutDetails')->name('about.details');

});
//frontend portfolio route
Route::controller(portfolioController::class)->group(function (){
    Route::get('/portfolio/add','addPortfolio')->name('add.portfolio');
    Route::post('/portfolio/store','storePortfolio')->name('store.portfolio');
    Route::get('/portfolio/show/all','showPortfolio')->name('show.portfolio');
    Route::get('/portfolio/edit/view/{id}','editPortfolio')->name('edit.view');
    Route::get('/portfolio/delete/{id}','deletePortfolio')->name('delete.item');
    Route::post('/portfolio/update','updatePortfolio')->name('update.portfolio');

    //portfolio details route
    Route::get('/portfolio/details/{id}','detailsPortfolio')->name('porfolio.details');
});





Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
