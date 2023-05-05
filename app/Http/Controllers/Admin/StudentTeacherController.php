<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use App\Models\User;

class StudentTeacherController extends Controller
{
    public function students($id){
        $students=DB::select('SELECT users.*
        FROM users
        INNER JOIN student_teacher ON users.id = student_teacher.student_id
        WHERE student_teacher.teacher_id = ?', [$id]);

        $teacher=Teacher::FindOrFail($id);
        return view("dashboard.teachers.students",compact('students','teacher'));
    }

    public function store(Request $request){
        DB::insert('insert into student_teacher (student_id	, teacher_id) values (?, ?)', [$request->student, $request->teacher]);
        return redirect()->route('teachers')->with('success','تم الاضافة بنجاح');;
    }

    public function show_teachers_student($id){
        $teachers=DB::select('SELECT teachers.* FROM teachers inner join student_teacher
        on teachers.id=student_teacher.teacher_id WHERE student_teacher.student_id=?;', [$id]);

        $student=User::FindOrFail($id);
        return view("dashboard.students.teachers",compact('teachers','student'));
    }
}
