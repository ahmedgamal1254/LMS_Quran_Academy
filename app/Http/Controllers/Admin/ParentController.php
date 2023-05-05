<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partent;
use App\Http\Requests\ParentRequst;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class ParentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $parents = DB::select('SELECT partents.*,count(users.parent_id)
    as students FROM `partents` INNER join users on partents.id=users.parent_id Group By partents.id');
    return view("dashboard.parents.index",compact("parents"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    return view('dashboard.parents.add');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ParentRequst $request)
  {
    $parents=new Partent();
    $parents->name=$request->name;
    $parents->email=$request->email;
    $parents->phone=$request->phone;
    $parents->country=$request->country;
    $parents->password= Hash::make($request->password);
    $parents->admin_id=Auth::guard('admin')->user()->id;
    $parents->save();

    return redirect('dashboard/parents')->with('success','تم اضافة ولى الامر بنجاح');
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
    $parent=Partent::findOrFail($id);
    return view("dashboard.parents.edit",compact("parent"));
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

    $parents=Partent::findOrFail($request->id);
    $parents->name=$request->name;
    $parents->email=$request->email;
    $parents->phone=$request->phone;
    $parents->country=$request->country;
    $parents->admin_id=Auth::guard('admin')->user()->id;
    $parents->save();

  return redirect('dashboard/parents')->with('success','تم التعديل ولى الامر بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function delete(Request $request)
  {
    $parents = Partent::find( $request->id );
    $parents->delete();

    return redirect('dashboard/parents')->with('success','تم حذف العنصر بنجاح');
  }

}

?>
