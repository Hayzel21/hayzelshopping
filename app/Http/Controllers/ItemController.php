<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;


class Itemcontroller extends Controller
{


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        $items = Item::all();
        // dd($items);
        return view('items.index' , compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $item = Item::find($id);
        $item_categoryID = $item->category_id;
        $item_categories = Item::where('category_id',$item_categoryID)
        ->orderBy('id','DESC')->limit(3)->get();
        return view('items.detail',compact('item','item_categories'));
    }

    // Filter items with categories id

    public function itemCategory(string $category_id){

        $itemCategories = Item::where('category_id',$category_id)
        ->get();

        return view('items.item_category',compact('itemCategories'));
    }

    public function itemCart(){
        $payments = Payment::all();
        return view('items.item_carts',compact('payments'));
        
    }

    public function orderNow(Request $request){
            // dd($request);
            $dataArr = json_decode($request->input('orderItems'));
            // var_dump($dataArr);
            $date = date('Y-m-d h:i:s');
            $vocherNo = strtotime($date);
            // echo ($vocherNo);

            // image upload

            $image = $request->file('paymentSlip');
            $fileName = time().'.'. $image->extension();


            $image->move(public_path('paymentSlip/'),$fileName);
            
          

            foreach ($dataArr as $key => $data) {
                $order = new Order();
                $order->vocherNo = $vocherNo;
                $order->qty = $data->qty;
                $order->total = $data->qty * ($data->price - (($data->discount /100) * $data->price));
                $order->status    = 'Pending';
                $order->paymentSlip = "/paymentSlip/".$fileName;
                $order->payment_id = $request->input('paymentMethod');
                $order->item_id = $data->id;
                $order->user_id = Auth::id();
                $order->save();
            }

                return 'Order Success';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
