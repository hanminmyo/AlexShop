<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function shop()
    {
        $items = Item::orderby('id','DESC')->paginate(8);
        //var_dump($items);

        return view('front.shops',compact('items'));
    }
    public function shopItem($id)
    {
        $item = Item::find($id);
        //var_dump($item);sss
        return view('front.shop-item',compact('item'));
    }

    public function carts() {
        $payments = Payment::all();
        return view('front.carts',compact('payments'));
    }

    public function orderNow (Request $request){
        // dd($request);
        $dataArray = json_decode($request->orderItems);
        // var_dump($dataArray);
        $voucher_no = time();
        // echo $voucher_no;

        //file upload
        $file_name = time().'.'.$request->payment_slip->extension(); //123412343434.png

        $upload = $request->payment_slip->move(public_path('images/payment-slips/'),$file_name); 
        //folder  ထဲကို upload လုပ်တာ
        // $data နဲ့ယူတာတွေသည် localStorage ထဲမှာသိမ်းထားတဲ့ data
        // $request နဲ့ယူတာတွေသည် input data တွေ
        foreach($dataArray as $data) {
            $order = new Order();
            $order->voucher_no = $voucher_no;
            $order->total = $data->qty*($data->price ($data->price*($data->discount/100)));
            $order->qty = $data->qty;
            $order->payment_slip = '/images/payment-slip/'.$file_name;
            $order->status = 'Pending';
            $order->note = $request->note;
            $order->item_id = $data->id;
            $order->payment_id = $request->payment_method;
            $order->user_id = Auth::id();
            $order->save();
        }
        return 'Your Order Successful';
    }
}
