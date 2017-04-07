<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryModel = new Category;
        if (isset($request->category_id)) {
            $categories = get_category_id($request->category_id);
            $items = Item::whereIn('category_id', $categories)->get();
        } else {
            $items = Item::all();
        }

        return view('pages.admin.product.listProduct', compact('items', 'categoryModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Hien list select category
        $categories = Category::all();
        return view('pages.admin.product.addProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->name =$request->name;
        $item->price= number_format($request->price, 2, '.', '');
        $item->alias= bo_dau($request->name);
        $item->category_id = $request->category_id;
        $item->sale = $request->sale;

        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('image/upload/', $fileName);
            $item->avatar = $fileName;
        }

        $item->guarantee = $request->guarantee;
        $item->made = $request->made;
        $item->category_id = $request->category_id;
        $item->description = $request->description;
        $item->detail= $request->detail;
        $item->save();

        return redirect()->action('Admin\ProductController@index')->with('status', 'THêm thành công');
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
        // HIen list select category
        $categories = Category::all();
        return view('pages.admin.product.editProduct', compact('categories', 'item'));
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
        $item = Item::find($id);
        $item->name =$request->name;
        $item->price= number_format($request->price, 2, '.', '');
        $item->alias= bo_dau($request->name);
        $item->category_id = $request->category_id;
        $item->sale = $request->sale ;

        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('image/upload/', $fileName);
            if (file_exists('image/upload/'.$item->avatar)) {
                File::delete('image/upload/'.$item->avatar);
            }
            $item->avatar = $fileName;
        }

        $item->guarantee = $request->guarantee;
        $item->made = $request->made;
        $item->category_id = $request->category_id;
        $item->description = $request->description;
        $item->detail= $request->detail;
        $item->save();
        
        return redirect()->action('Admin\ProductController@index')->with('status', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
    }
}
