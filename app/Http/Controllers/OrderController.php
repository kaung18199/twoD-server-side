<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //order page direct
    public function orderPage(){
        $order = Order::select('orders.*','users.*')
                ->leftJoin('users','users.id','orders.user_id')
                ->get();

        return view('admin.order',compact('order'));
    }

    //order state
    public function orderState(Request $request,$id){
        Order::where('order_id',$id)->update([
            'state'=>$request->state
        ]);

        return back()->with(['success'=>'State change success']);
    }

    //order code get
    public function orderCode($code){
        $order = Order::select('orders.*','users.*')
                ->leftJoin('users','users.id','orders.user_id')
                ->get();



        $orderD = OrderList::select('order_lists.*','users.name')
                ->join('users','users.id','order_lists.user_id')
                ->where('order_code',$code)->get();

        return view('admin.order',compact('orderD','order'));
    }
}
