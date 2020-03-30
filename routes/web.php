<?php

use App\StudentAffairs\Level;
use App\DataTables\MaterialDataTable;

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
// login page
Route::any('/sys-login', function () {
    return view('studentAffairs.auth.login-page');
});



Route::any('/logins', 'AdminController@login');

Route::any('/forget-pass', 'AdminController@forget_pass');
Route::any('/forget', function(){
    return view('studentAffairs.auth.forgot-pass');

});


// multi language [ar,en]
Route::get('lang/{lang}', function ($lang) {
    if(session()->has('lang')){
        session()->forget('lang');
    }
    session()->put('lang',$lang);
    return back();
})->name('lang');

//, 'AutoCheckPermission'
// all routes for our system.

Route::group(['middleware' => ['auth:admin']], function () {
    
    Route::resource('admins', 'AdminController');
    // welcome page 
    // Route::get('/', function () {
    //     return view('index');
    // });

    Route::get('/dashboard', function () {
        return view('index');
    });
    
    
     Route::post('/sys-logout', function () {
        auth()->guard('admin')->logout();
        return redirect(url('/sys-login'));
    });

    Route::resource('course', 'CourseController');
    
    Route::resource('stage', 'StageController');
    Route::resource('level', 'LevelController');
    Route::resource('class', 'ClassController');

    
    Route::get('/select-course', function(){
        return view('studentAffairs.course.material.select_course');
    });
    Route::resource('material', 'MaterialController');
    Route::post('materials', 'MaterialController@index');

    Route::get('/get-material', 'CourseController@materials');
    Route::any('destroyfile', 'CourseController@destroyFile');

    Route::get('new-material', 'CourseController@viewFile');
    Route::post('upload', 'CourseController@uploadFile');


    Route::resource('setting', 'SettingController');
    Route::resource('academicyear', 'AcademicYearController');
    Route::resource('region', 'RegionController');
    Route::resource('place', 'PlaceController');
    Route::resource('nationality', 'NationalityController');

    Route::resource('permission', 'PermissionController');
});


// routes for student
Route::get('/std-login', function () {
    return view('studentAffairs.auth.login-std');
});

Route::any('/login-std', 'StudentsController@login');


Route::group(['middleware' => ['auth:std']], function () {

    Route::post('/std-logout', function () {
        auth()->guard('std')->logout();
        return redirect(url('/std-login'));
    });

    Route::any('/', 'StudentsController@courses');
    Route::any('/videos/{id}', 'StudentsController@videos');
    Route::any('/files/{id}', 'StudentsController@files');

});






Route::resource('revenueitem', 'RevenueItemController');
Route::resource('coursestudent', 'CourseStudentController');
Route::resource('absent', 'AbsentController');
Route::resource('examabsent', 'ExamAbsentController');
Route::resource('control', 'ControlController');
Route::resource('committee', 'CommitteeController');
Route::resource('committestudent', 'CommitteStudentController');
Route::resource('financial', 'FinancialController');
Route::resource('discount', 'DiscountController');
Route::resource('levelstudent', 'LevelStudentController');
Route::resource('category', 'CategoryController');
Route::resource('bus', 'BusController');
Route::resource('busregion', 'BusRegionController');
Route::resource('checkout', 'CheckOutController');
Route::resource('debt', 'DebtController');
Route::resource('approvaldegree', 'ApprovalDegreeController');
Route::resource('bank', 'BankController');
Route::resource('image', 'ImageController');


// for super admin
Auth::routes();
// all routes for our system.
Route::group(['middleware' => 'auth'], function () {
    // setting page 

    Route::get('/super-admin', 'SuperAdminController@all');

    Route::post('/super-admin-data', 'SuperAdminController@Setting');

});
Route::get('/home', 'HomeController@index')->name('home');
