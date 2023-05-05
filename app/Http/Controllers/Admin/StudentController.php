<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Offer;
use App\Http\Requests\StudentRequst;
use Illuminate\Support\Facades\Hash;
use Auth;

class StudentController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::all();
    return view("dashboard.students.index",compact("users"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
   $offers=Offer::all();
    return view('dashboard.students.add',compact("offers"));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StudentRequst $request)
  {
    $users=new User();
    $users->name=$request->name;
    $users->email=$request->email;
    $users->phone=$request->phone;
    $users->country=$request->country;
    $users->offer_id=$request->offer;
    $users->password= Hash::make($request->password);
    $users->admin_id=Auth::guard('admin')->user()->id;
    $users->save();

    return redirect('dashboard/students')->with('success','تم اضافة الطالب بنجاح');
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
    $user=User::findOrFail($id);
    $offers=Offer::all();
    return view("dashboard.students.edit",compact("user","offers"));
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

    $users=User::findOrFail($request->id);
    $users->name=$request->name;
    $users->email=$request->email;
    $users->phone=$request->phone;
    $users->country=$request->country;
    $users->offer_id=$request->offer;
    $users->admin_id=Auth::guard('admin')->user()->id;
    $users->save(); 

  return redirect('dashboard/students')->with('success','تم التعديل الطالب بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete(Request $request)
  {
    $users = User::find( $request->id );
    $users->delete();

    return redirect('dashboard/students')->with('success','تم حذف العنصر بنجاح');
  }
  
}

?>