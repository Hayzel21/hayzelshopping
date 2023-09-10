<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
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
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd($request);
        $categories = Category::create($request->all());

        $fileName = time().'.'.$request->photo->extension();

        $upload = $request->photo->move(public_path('image/'));
        $fileName;
        if($upload){
            $categories->photo = "/image/". $fileName;
        }
        $categories->save();
        return redirect()->route('backend.categories.index');
        $categories->save();
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        // dd($request);
        $category = Category::find($id);
        $category->update($request->all());

        if($request->hasFile('newPhoto')){

            $fileName = time().'.'.$request->newPhoto->extension();

            $upload = $request->newPhoto->move(public_path('image/'),$fileName);
            if($upload){
                $category->photo = "/image/". $fileName;
            }
          
        }else{

            $category->photo = $request->oldPhoto;
        }
        $category->save();
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('backend.categories.index');
    }
}
