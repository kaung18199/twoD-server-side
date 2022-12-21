<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //cart create
    public function cartCreate(Request $request){
        $data = [
            'user_id' => $request->userId,
            'type' => $request->type,
            'number' => $request->number,
            'time' => $request->time,
            'amount' =>$request->amount
        ];

        Cart::create($data);

        $cart = Cart::select('carts.*','users.name')
                    ->join('users','carts.user_id','users.id')
                    ->where('user_id',$request->userId)->get();

        $totalCart = 0;
        foreach($cart as $c){
            $totalCart += $c->amount;
        }

        return response()->json([
            'cart' => $cart,
            'total' => $totalCart
        ],200);
    }

    public function cartGet(Request $request){
        $cart = Cart::select('carts.*','users.name')
                    ->join('users','carts.user_id','users.id')
                    ->where('user_id',$request->user_id)->get();

                    $totalCart = 0;
                    foreach($cart as $c){
                        $totalCart += $c->amount;
                    }
        return response()->json([
            'cart' => $cart,
            'total' => $totalCart
        ],200);
    }

    //cart delete
    public function cartDelete(Request $request){
        Cart::where('cart_id',$request->cart_id)->delete();

        $cart = Cart::select('carts.*','users.name')
                ->join('users','carts.user_id','users.id')
                ->where('user_id',$request->user_id)->get();

        $totalCart = 0;
        foreach($cart as $c){
            $totalCart += $c->amount;
        }
        return response()->json([
            'cart' => $cart,
            'total' => $totalCart
        ],200);
    }

    //cart confirm
    public function cartConfirm(Request $request){
        $cart = Cart::select('cart_id','user_id','type','number','time','amount')
                    ->where('user_id',$request->user_id)->get();
        return response()->json([
            'cart' => $cart
        ],200);
    }

    //cart to order list
    public function orderListCreate(Request $request){
        $total = 0;

        foreach($request->all() as $item){
            $data = OrderList::create([
                'user_id' => $item['user_id'],
                'cart_id' => $item['cart_id'],
                'type' => $item['type'],
                'number' => $item['number'],
                'time' => $item['time'],
                'amount'=>$item['amount'],
                'order_code'=>$item['order_code'],
            ]);
            $total += $data->amount;
        }
        Cart::where('user_id',$request[0]['user_id'])->delete();

        Order::create([
            'user_id' => $data->user_id,
            'order_code'=>$data->order_code,
            'total' => $total
        ]);

        return response()->json([
            'success'=> 'true'
        ]);
    }

    //for order
    public function orderGet(Request $request){
        $order = Order::where('user_id',$request->user_id)
                        ->orderBy('created_at','desc')
                        ->get();

        return response()->json([
            'order'=>$order
        ]);
    }

    //order detail
    public function orderDetail(Request $request){
        $orderList = OrderList::select('order_lists.*','users.name')
                                ->join('users','order_lists.user_id','users.id')
                                ->where('order_lists.order_code',$request->order_code)
                                ->get();
        return response()->json(
            ['orderList' => $orderList]
        );
    }
}
