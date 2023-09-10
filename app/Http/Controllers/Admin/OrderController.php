<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware(function($request,$next){
            $this->user = Auth::user();
           if($this->user->role == 'Super Admin' || $this->user->role == 'Admin'){
            return $next($request);
           }
           else{
                return back();
           }
        });
    }
    public function index(){

        $status = request('status');
        // dd($status);
        $orders = Order::all();
        // dd($orders);
        $vocherNoGroup = $orders->groupBy('vocherNo')->toArray();
        // dd($vocherNoGroup);

        foreach($vocherNoGroup as $group){
            $orderIds = array_column($group,'id');
            // var_dump($orderIds);
            $orderwithUser[] = Order::with('user')->whereIn('id',$orderIds)->where('status', $status)->first();
        }

      

       
        return view ('admin.orders.index',compact('orderwithUser'));
    }

    public function detail($vocherNo){
        // dd($vocherNo);
        $orders = Order::where('vocherNo',$vocherNo)->get();
        $ordersFirst = Order::where('vocherNo',$vocherNo)->first();
        return view('admin.orders.detail',compact('orders','ordersFirst'));
    }

    public function status(Request $request,$vocherNo){
            // dd($request,$vocherNo);
            Order::where('vocherNo',$vocherNo)->update(['status'=>$request->status]);
            return redirect()->route('backend.orders.index');
    }
    


}
