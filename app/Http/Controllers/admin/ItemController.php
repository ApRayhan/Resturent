<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();   
        return view('admin.item.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'category' => 'required',
            'price'    => 'required',
            'description' => 'required',
            'image'       => 'required|mimes:jpeg,jpg,png,bmp',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $date = Carbon::now()->toDateString();
            $imagename = $slug. '-' . $date. '-'. uniqid(). '-' .'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }
            $image->move('uploads/item',$imagename);
        }else {
            $imagename = 'Default.png';
        }
        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('item.index')->with('successMsg', 'The Item Will Be Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categorys = Category::all();

        return view('admin.item.edit', compact('item', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'category' => 'required',
            'price'    => 'required',
            'description' => 'required',
            'image'       => 'mimes:jpeg,jpg,png,bmp',
        ]);
        $item = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $date = Carbon::now()->toDateString();
            $imagename = $slug. '-' . $date. '-'. uniqid(). '-' .'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }
            unlink('uploads/item/'.$item->image);
            $image->move('uploads/item',$imagename);
        }else {
            $imagename = $item->image;
        }
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $imagename;
        $item->save();
        return redirect()->route('item.index')->with('successMsg', 'The Item Will Be Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('uploads/item/'.$item->image)) {
            unlink('uploads/item/'.$item->image);
        }
        $item->delete();
        return redirect()->route('item.index')->with('successMsg', 'The Item Will Be Deleted');
    }
}