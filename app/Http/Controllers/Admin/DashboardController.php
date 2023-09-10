<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

        return view('admin.index');
    }
}
