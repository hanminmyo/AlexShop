<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\ItemRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::OrderBy('id','DESC')->paginate(15);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $categories = Category::create($request->all());
    

        //file uplaod
        $file_name = time().'.'.$request->image->extension(); //123412343434.png 

        $upload = $request->image->move(public_path('images/categories/'),$file_name);
        if($upload){
            $categories->image = "/images/categories/".$file_name;
        }



        $categories->save();
        return redirect()->route('backend.categories.index');
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
        $categories = Category::all();
        return view('admin.categories.edit',compact('item','categories'));
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
        //echo "<h1>$id</h1>";
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('backend.items.index');
    }
}
