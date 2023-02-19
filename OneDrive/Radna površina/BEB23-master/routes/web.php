<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\QuestionController;

Route::get('/',[ HomePageController::class,'index'])->name('homepage');

Route::get('/',[HomePageController::class, 'showN']);

Route::get('/register', [RegisterController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('register-user');

Route::get('/login', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::post('login-user', [LoginController::class,'loginUser'])->name('login-user');

Route::get('/studentpage', [StudentController::class, 'studentpage'])->middleware('isLoggedIn');

Route::get('studentpage',[StudentController::class, 'showCourses'])->middleware('isLoggedIn');

Route::get('/mycourses', [StudentController::class, 'mycourses'])->middleware('isLoggedIn');

Route::get('/teststudentpage', [StudentController::class, 'teststudentpage'])->middleware('isLoggedIn');

Route::get('/teststudentpage',[StudentController::class, 'ExS'])->middleware('isLoggedIn');

Route::get('/testpitanja/{id}', [StudentController::class, 'examP'])->middleware('isLoggedIn');

Route::post('/submit_question', [StudentController::class, 'submit_question'])->middleware('isLoggedIn');

Route::get('/analysis', [StudentController::class, 'analysis'])->middleware('isLoggedIn');

Route::get('/mycourses',[StudentController::class, 'showCM'])->middleware('isLoggedIn');

Route::post('EnrollS/', [StudentController::class, 'EnrollS'])->name('EnrollS')->middleware('isLoggedIn');

Route::get('/download/{file}',[StudentController::class, 'download'])->middleware('isLoggedIn');

Route::get('/adminpage', [AdminController::class, 'adminpage'])->middleware('isLoggedIn');

Route::get('adminpage',[AdminController::class, 'show'])->middleware('isLoggedIn');

Route::get('adminpage/{id}',[AdminController::class, 'AcceptR'])->name('AcceptR')->middleware('isLoggedIn');

Route::post('adminpage/{id}',[AdminController::class, 'DeclineR'])->name('DeclineR')->middleware('isLoggedIn');

Route::delete('/{user}',[AdminController::class, 'destroyU'])->name('destroyU')->middleware('isLoggedIn');

Route::put('adminpage/{contact}',[AdminController::class,'update'])->name('update')->middleware('isLoggedIn');;

Route::post('store', [NewsController::class, 'store'])->name('store')->middleware('isLoggedIn');

Route::delete('adminpage/{news}',[NewsController::class, 'destroy'])->name('destroy')->middleware('isLoggedIn');

Route::get('/teacherpage', [TeacherController::class, 'teacherpage'])->middleware('isLoggedIn');

Route::post('storeC', [CoursesController::class,'storeC'])->name('storeC')->middleware('isLoggedIn');

Route::get('/teacherpage',[CoursesController::class, 'showCourse'])->middleware('isLoggedIn');

Route::put('teacherpage/{id}',[CoursesController::class, 'ZatvoriC'])->name('ZatvoriC')->middleware('isLoggedIn');

Route::delete('teacherpage/{course}',[CoursesController::class, 'destroyCr'])->name('destroyCr')->middleware('isLoggedIn');

Route::delete('testpage/{exam}',[ExamController::class, 'destroyExm'])->name('destroyExm')->middleware('isLoggedIn');

Route::post('addLectures/', [MaterialsController::class,'addLectures'])->name('addLectures')->middleware('isLoggedIn');

Route::post('AddExam',[ExamController::class,'AddExam'])->name('AddExam')->middleware('isLoggedIn');

Route::get('/testpage', [ExamController::class, 'testpage'])->middleware('isLoggedIn');

Route::get('testpage',[ExamController::class,'showExam'])->name('showExam')->middleware('isLoggedIn');

Route::post('createQ/', [QuestionController::class, 'createQ'])->name('createQ')->middleware('isLoggedIn');

Route::get('/analysisT', [TeacherController::class, 'analysisT'])->middleware('isLoggedIn');

Route::get('logout', [LoginController::class,'logout'])->name('logout');

Auth::routes();

