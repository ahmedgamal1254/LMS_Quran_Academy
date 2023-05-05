<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentParentController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StudentTeacherController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes for Offers and packages
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
});


// Routes for Offers and packages
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard/offers', [OfferController::class, 'index'])->name('offers');
    Route::get('dashboard/offer/{id}/{notification_id}', [OfferController::class, 'show'])->name('offer.show');
    Route::get('dashboard/offer/notifications', [OfferController::class, 'read_all_notification'])->name('offer.read_all');
    Route::get('dashboard/offers/create', [OfferController::class, 'create'])->name('offers.add');
    Route::post('dashboard/offers/store', [OfferController::class, 'store'])->name('offers.store');
    Route::get('dashboard/offers/search', [OfferController::class, 'search'])->name('offers.search');
    Route::get('dashboard/offers/edit/{id}', [OfferController::class, 'edit'])->name('offers.edit');
    Route::post('dashboard/offers/update', [OfferController::class, 'update'])->name('offers.update');
    Route::post('dashboard/offers/delete', [OfferController::class, 'delete'])->name('offers.delete');
});

// Routes for teachers
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::get('dashboard/teachers/create', [TeacherController::class, 'create'])->name('teachers.add');
    Route::post('dashboard/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('dashboard/teachers/search', [TeacherController::class, 'search'])->name('teachers.search');
    Route::get('dashboard/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('dashboard/teachers/update', [TeacherController::class, 'update'])->name('teachers.update');
    Route::post('dashboard/teachers/delete', [TeacherController::class, 'delete'])->name('teachers.delete');
});

// Routes for students
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard/students', [StudentController::class, 'index'])->name('students');
    Route::get('dashboard/students/create', [StudentController::class, 'create'])->name('students.add');
    Route::post('dashboard/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('dashboard/students/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('dashboard/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('dashboard/students/update', [StudentController::class, 'update'])->name('students.update');
    Route::post('dashboard/students/delete', [StudentController::class, 'delete'])->name('students.delete');
});

// Routes for parents
Route::middleware(['isAdmin'])->group(function () {
    Route::get('dashboard/parents', [ParentController::class, 'index'])->name('parents');
    Route::get('dashboard/parents/create', [ParentController::class, 'create'])->name('parents.add');
    Route::post('dashboard/parents/store', [ParentController::class, 'store'])->name('parents.store');
    Route::get('dashboard/parents/search', [ParentController::class, 'search'])->name('parents.search');
    Route::get('dashboard/parents/edit/{id}', [ParentController::class, 'edit'])->name('parents.edit');
    Route::post('dashboard/parents/update', [ParentController::class, 'update'])->name('parents.update');
    Route::post('dashboard/parents/delete', [ParentController::class, 'delete'])->name('parents.delete');
});

// Routes for teacher students
Route::middleware(['isAdmin'])->group(function () {
    Route::get('teacher_student/add', function () {
        $users=App\Models\User::all();
        $teachers=App\Models\Teacher::all();
        return view("dashboard.teacher_student.add",compact('users','teachers'));
    })->name("teacher_student.add");

    Route::get('parent_student/add', function () {
        $users=App\Models\User::all();
        $parents=App\Models\Partent::all();
        return view("dashboard.parent_student.add",compact('users','parents'));
    })->name("parent_student.add");

    Route::get('student/search', function () {
        $keyword=request("value");
        $results = App\Models\User::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        })->get();
        return $results;
    })->name("student.ajax.search");

    Route::get('teacher/search', function () {
        $keyword=request("value");
        $results = App\Models\Teacher::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        })->get();
        return $results;
    })->name("teacher.ajax.search");

    Route::get('parent/search', function () {
        $keyword=request("value");
        $results = App\Models\Partent::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        })->get();
        return $results;
    })->name("parent.ajax.search");


    Route::post('teacher/studentsAdd', [StudentTeacherController::class,'store'])->name('teacher_student_relation');
    Route::post('parent/studentsAdd', [StudentParentController::class,'store'])->name('parent_student_relation');
    Route::get('teacher/{id}/students',[StudentTeacherController::class,'students'])->name('teacher.students');
    Route::get('student/{id}/teachers',[StudentTeacherController::class,'show_teachers_student'])->name('student.teachers');
    Route::get('parent/{id}/children',[StudentParentController::class,'show_parent_student'])->name('parent.students');
});
require __DIR__.'/admin_auth.php';
