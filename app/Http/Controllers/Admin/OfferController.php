<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateOffer;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index()
    {
        $offers=Offer::all();
        return view("dashboard.offers.index",compact('offers'));
    }

    public function show($id,$notification_id){
        $offer=Offer::find($id);
        $id=DB::table('notifications')->where('data->offer_id',$id)->where('id',$notification_id)->first()->id;
        DB::table('notifications')->where('id',$id)->update(['read_at'=>now()]);
        return view("dashboard.offers.show",compact('offer'));
    }

    public function read_all_notification(){
        $auth_id=Auth::guard('admin')->user()->id;
        $notifications=DB::table('notifications')->where('notifiable_id',$auth_id)->where('read_at',null)->get();

        DB::table('notifications')->where('notifiable_id',$auth_id)->where('read_at',null)->update(["read_at"=>now()]);
        return redirect()->back();
    }

    public function create()
    {
        return view("dashboard.offers.add");
    }

    public function store(OfferRequest $request)
    {

        $offer=new Offer();
        $offer->name=$request->name;
        $offer->description=$request->desc;
        $offer->genre=$request->genre;
        $offer->user_id=Auth::guard('admin')->user()->id;
        $offer->save();

        $users=Admin::where('id','!=',Auth::guard('admin')->user()->id)->get();
        Notification::send($users, new CreateOffer($offer,Auth::guard('admin')->user()->name));
        return redirect('dashboard/offers')->with('success','تم اضافة العنصر بنجاح');
    }

    public function search(Request $request){
        $offers=Offer::where('id','<=',1000000000);
        if($request->genre != 0){
            $offers=Offer::where('genre',$request->genre);
        }
        $offers=$offers->get();
        return view("dashboard.offers.search",compact('offers'));
    }

    public function edit($id){
        $offer=Offer::where('id',"=",$id)->first();
        return view("dashboard.offers.edit",compact("offer"));
    }

    public function update(OfferRequest $request)
    {
        $offer=Offer::find($request->id);
        $offer->name=$request->name;
        $offer->description=$request->desc;
        $offer->genre=$request->genre;
        $offer->user_id=Auth::guard('admin')->user()->id;
        $offer->save();

        return redirect('dashboard/offers')->with('success','تم تعديل العنصر بنجاح');
    }

    public function delete(Request $request){
        $offer = Offer::find( $request->id );
        $offer ->delete();

        return redirect('dashboard/offers')->with('success','تم حذف العنصر بنجاح');
    }
}
