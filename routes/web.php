<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\client\ControllPannelController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\ResetPasswordController;
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

//start  roles managment
Route::get('/generate_roles', [SettingsController::class, 'generateRoles'])->name('generate_roles');
//end roles managment

Route::get('/users', [AuthController::class, 'listAll'])->name('users');
Route::get('/createUser', [AuthController::class, 'create'])->name('create_user');
Route::post('/createUser', [AuthController::class, 'register'])->name('save_user'); //save_user
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('do_login');//do_login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



    // ------------------------------------------------------------------------
    // reset password
    // ------------------------------------------------------------------------

Route::get('/forget-password',  [ForgotPasswordController::class,'getEmail'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class,'postEmail'])->name('forget-pass');
Route::get('/reset-password/{token}', [ResetPasswordController::class,'getPassword'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class,'updatePassword'])->name('update-password');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    // ------------------------------------------------------------------------
    // Static pages section
    // ------------------------------------------------------------------------
    Route::get('/', [ControllPannelController::class, 'index'])->name('home');
    Route::view('/aboutUs', 'client.static.about_us')->name('aboutus');
    Route::view('/contactUs', 'client.static.contactUs')->name('contactus');
    Route::view('/freelancers', 'client.user.freelancers')->name('freelancers');
    Route::view('/user-profile', 'client.userProfile.userProfile')->name('user-profile');

    // here the reset password page as UI

    Route::view('/resetPassword', 'client.user.resPassword')->name('reset_password');
    // Route::view('/resetPassword', 'login')->name('reset_password');

    // ------------------------------------------------------------------------
    // Admin section
    // ------------------------------------------------------------------------

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admin', [ControllPannelController::class, 'admin'])->name('admin');
        //////////////////////CRUD skills ////////////////
        Route::get('/list_skills', [SkillController::class, 'list_skills'])->name("list_skills");
        Route::get('/add_skill', [SkillController::class, 'add_skill'])->name('add_skill');
        Route::post('/add_skill', [SkillController::class, 'store'])->name('save_skill');
        Route::get('/edit_skill/{skill_id}', [SkillController::class, 'edit'])->name('edit_skill');
        Route::post('/edit_skill/{skill_id}', [SkillController::class, 'update'])->name('update_skill');
        Route::get('/toggle_skill/{skill_id}', [SkillController::class, 'toggle'])->name('toggle_skill');

        //////////////////////CRUD category ////////////////
        Route::get('/list_categories', [CategoriesController::class, 'list_category'])->name('list_categories');
        Route::get('/add_category', [CategoriesController::class, 'add_category'])->name('add_category');
        Route::post('/add_category', [CategoriesController::class, 'store'])->name('save_category');
        Route::get('/edit_category/{cat_id}', [CategoriesController::class, 'edit'])->name('edit_category');
        Route::post('/edit_category/{cat_id}', [CategoriesController::class, 'update'])->name('update_category');
        Route::get('/toggle_category/{cat_id}', [CategoriesController::class, 'toggle'])->name('toggle_category');
    });
});

//  start email verify
	Route::get('/verify_email/{token}',[AuthController::class,'verifyEmail'])->name('verify_email');
//  end email verify


