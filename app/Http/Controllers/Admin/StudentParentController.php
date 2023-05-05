<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Partent;

class StudentParentController extends Controller
{
    public function store(Request $request){
        DB::update('update users set parent_id = ? where id = ?', [$request->parent, $request->student]);
        return redirect()->route('parents')->with('success','تم الاضافة بنجاح');;
    }

    public function show_parent_student($id){
        $users=DB::select('SELECT users.* FROM `partents` INNER join users on users.parent_id=partents.id where partents.id=?', [$id]);

        $parent=Partent::FindOrFail($id);
        return view("dashboard.parent_student.students",compact('users','parent'));
    }
}
