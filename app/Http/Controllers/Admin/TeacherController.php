<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;



class TeacherController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $teachers=DB::select('SELECT teachers.id, teachers.name,teachers.email,teachers.phone,teachers.country, COUNT(student_teacher.teacher_id) as student_count FROM teachers LEFT JOIN student_teacher ON teachers.id = student_teacher.teacher_id GROUP BY teachers.id;');
    return view("dashboard.teachers.index",compact("teachers"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view("dashboard.teachers.add");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(TeacherRequest $request)
  {
        $teacher=new Teacher();
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->country=$request->country;
        $teacher->password= Hash::make($request->password);
        $teacher->user_id=Auth::guard('admin')->user()->id;
        $teacher->save();

        return redirect('dashboard/teachers')->with('success','تم اضافة المدرس بنجاح'); 
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $teacher=Teacher::findOrFail($id);
    return view("dashboard.teachers.edit",compact("teacher"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
      $request->validate([
        'name' => ['string','required'],
        'email' => ['string','required'],
        'phone'  => ['required','numeric'],
        'country' => ['string','required']
      ]);

      $teacher=Teacher::findOrFail($request->id);
      $teacher->name=$request->name;
      $teacher->email=$request->email;
      $teacher->phone=$request->phone;
      $teacher->country=$request->country;
      $teacher->user_id=Auth::guard('admin')->user()->id;
      $teacher->save(); 

    return redirect('dashboard/teachers')->with('success','تم التعديل المدرس بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete(Request $request)
  {
      $teacher = Teacher::find( $request->id );
      $teacher->delete();

      return redirect('dashboard/teachers')->with('success','تم حذف العنصر بنجاح');
  }
  
}

?>