<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\PaymentUpdateRequest;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){
            
            if(in_array(Auth::user()->role, ['Super Admin','Admin'])){
                return $next($request);
            }else{
                return back();
            }
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::paginate(5);
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        // dd($request);
        $payments = Payment::create($request->all());

        $fileName = time().'.'.$request->logo->extension();

        $upload = $request->logo->move(public_path('image/'));
        $fileName;
        if($upload){
            $payments->logo = "/image/". $fileName;
        }
        $payments->save();
        return redirect()->route('backend.payments.index');
        $payments->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, string $id)
    {
        // dd($request);
        $payment = Payment::find($id);
        $payment->update($request->all());
        
        if($request->hasFile('newLogo')){

            $fileName = time(). '.' . $request->newLogo->extension();
            $upload = $request->newLogo->move(public_path('images/'),$fileName);

            if($upload){

                $payment->logo = "/images/". $fileName;
            }
        }else{
            $payment->logo = $request->oldLogo;

        }

        $payment->save();
        return redirect()->route('backend.payments.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('backend.payments.index');

 
    }
}
