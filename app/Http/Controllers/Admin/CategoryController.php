<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use DB;

class CategoryController extends Controller
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
            $categories = Category::find(get_category_id($request->category_id));
        } else {
            $categories = Category::all();
        }

        return view('pages.admin.cate.listCate', compact('categories', 'categoryModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.cate.addCate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id =$request->parent_id;
        $category->alias = bo_dau($request->name);
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('status', 'Thêm thành công thể loại');
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
        $category = Category::find($id);
        $categories = Category::all();

        return view('pages.admin.cate.editCate', compact('categories', 'category'));
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id =$request->parent_id;
        $category->alias = bo_dau($request->name);
        $category->save();
        return redirect()->action('Admin\CategoryController@index')->with('status', 'Sửa thành công thể loại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $categoroesId = get_category_id($id);
            $items = Item::whereIn('category_id', $categoroesId)->pluck('id');
            Item::destroy($items->toArray());
            Category::destroy($categoroesId);
            DB::commit();
            return url()->full();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
