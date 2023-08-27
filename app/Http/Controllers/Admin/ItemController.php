<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        // dd($request);
        $items = Item::create($request->all());
        
        // image upload

        $fileName = time().'.'.$request->image->extension();

        $upload = $request->image->move(public_path('image/'));
        $fileName;
        if($upload){
            $items->image = "/image/". $fileName;
        }
        $items->save();
        return redirect()->route('items.index');

        //  // dd($request);
        // // $items = Item::create($request->all());0.

       
        // $data = [
        //     'name' => $request->input('name'),
        //     'codeNo' => $request->input('codeNo'),
        //     'price' => $request->input('price'),
        //     'image' =>$request->input('image'),
        //     'inStock' => $request->input('inStock'), // Make sure this line is included
        //     'description' =>$request->input('description'),
        //     'discount' =>$request->input('discount')
        // ];
        
        // // Insert the data into the database
        // $items = Item::create($data);
        // $items->save(); // Assuming your model is named 'Item'
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
