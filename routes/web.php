<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DesginationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Faculty\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('webiste.home');
// });
// Route::get('/about',function() {
//     return view('webiste.about');
// });
// Route::get('/courses',function() {
//     return view('webiste.courses');
// });
// Route::get('/teachers',function() {
//     return view('webiste.teachers');
// });
// Route::get('/blog',function() {
//     return view('webiste.blog');
// });
// Route::get('/contact',function() {
//     return view('webiste.contact');
// });

Route::controller(WebController::class)->group(function () {
    Route::get('/','home');
    Route::get('/teachers','getTeachers');
    Route::get('/about','getAbout');
    Route::get('/courses','getCourses');
    Route::get('/contact','getContact');
    Route::get('/
    
    ','getAttendence');
    Route::get('/event','getEvent');
});

Route::get('/event/details/{id}', [EventController::class, 'show'])->name('event.details');


Route::controller(UserController::class)->group(function() {
    Route::post('/user/store','store');
});

Route::controller(QueryController::class)->group(function () {
    Route::post('/query/store','store');
});

// admin Site

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::POST('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::prefix('/admin')->middleware('auth:admin')->group(function() {
    Route::POST('/logout',[LoginController::class,'Logout'])->name('logout');

    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard.page');
    Route::get('/profile_update/view', [LoginController::class, 'profile_update_view']);
    Route::post('/update_profile',[LoginController::class , 'update_profile'])->name('update_profile');

    // User
    Route::get('/user',[UserController::class, 'index'])->name('users.index');

    // Teacher
    Route::get('teacher', [TeacherController::class,'index'])->name('teachers.index');
    Route::post('/teacher/store',[TeacherController::class,'store']);
    Route::delete('/teacher/delete{id}',[TeacherController::class,'destroy'])->name('teacher.destroy');

    // Desgination
    Route::get('desgination',[DesginationController::class,'index']);

    // Banner
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner','index')->name('banner.index');
        Route::post('/banner/store','store');
        Route::delete('/banner/destroy/{id}','destroy')->name('banner.destroy');
    });

    // About Controller
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about','index')->name('about.index');
        Route::post('/about/store','store');
    });

      // Course Controller
      Route::controller(CourseController::class)->group(function () {
        Route::get('/course','index')->name('course.index');
        Route::post('/course/store','store');
        Route::delete('/course/destroy/{id}','destroy')->name('course.destroy');
    });

    // Blog Controller 
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog','index')->name('blog.index');
        Route::post('/blog/store','store');
        Route::delete('/blog/destroy/{id}','destroy')->name('blog.destroy');
    });

    // Attendence Controller 
    Route::controller(AttendenceController::class)->group(function () {
    Route::get('/attendence','index')->name('attendence.index');
        Route::post('/attendence/store','store');
        Route::delete('attendence/destroy/{id}','destroy')->name('attendencesheet.destroy');
    });

    // Event Controller 
    Route::controller(EventController::class)->group(function() {
        Route::get('/event','index')->name('event.index');
        Route::get('/event/create','create');
        Route::post('/event/store','store')->name('admin.event.store');
        Route::delete('event/destroy/{id}','destroy')->name('event.destroy');
    });

    // User Details
    Route::get('/teacher/details/{id}',[UserController::class,'teacherDetails']);

    // Setting Routes
    Route::get('/settings', [SettingController::class, 'settings']);
    Route::post('/update_setting', [SettingController::class, 'update_settings'])->name('update_setting');

});



// faculty site

Route::get('/faculty/login', [LoginController::class, 'facultyIndex'])->name('faculty');
Route::POST('/faculty/login', [LoginController::class, 'facultyLogin'])->name('faculty.login');


Route::prefix('/faculty')->middleware('auth:faculty')->group(function() {
    Route::POST('/facultylogout',[LoginController::class,'facultyLogout'])->name(name: 'faculty.logout');

    // Route::get('/dashboard',[HomeController::class,'facultyIndex'])->name('dashboard.page');
    Route::get('/profile_update/view', [LoginController::class, 'faculty_profile_update_view']);
    Route::get('/profile/edit', [LoginController::class, 'faculty_profile_update_edit']);
    Route::post('/update_profile',[LoginController::class , 'update_profile'])->name('update_profile');


    // Course Controller
        // Route::controller(BookController::class)->group(function () {
        // Route::get('/book','index')->name('book.index');
        // Route::post('/book/store','store');
        // Route::delete('/book/destroy/{id}','destroy')->name('book.destroy');
        // });
    

});