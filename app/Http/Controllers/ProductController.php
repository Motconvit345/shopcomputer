<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $otherProducts = Item::inRandomOrder()->limit(5)->get();
        $item = Item::findOrFail($id);
        return view('pages.web.detailProduct', compact('item', 'otherProducts'));
    }

    public function showFollowCategory($alias, $id, Request $request)
    {
        //Check nếu id=0 lấy tất cả sản phẩm
        if (!$id) {
            $items = Item::paginate(12);
            $title = "Tất cả sản phẩm";
        } else {
            $items = Item::whereIn('category_id', get_category_id($id));
            $title = Category::find($id)->name;
        }

        //Nếu tồn tại filter thì tìm sản phẩm theo điều kiện lọc
        if (isset($request->filter)) {
            $items = Item::where('producer', $request->filter);
        }
        //Nếu tồn tài order

        if (isset($request->order)) {
            switch ($request->order) {
                case 'asc':
                    $items = $items->orderBy('price');
                    break;
                case 'desc':
                    $items = $items->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $items = $items->latest();
                    break;
            }
        }
        // Láy nhóm producer để lọc tìm kiếm
        $producers = Item::whereIn('category_id', get_category_id($id))->groupBy('producer')->select('producer')->get();
        $items = $items->paginate(12);
        return view('pages.web.product', compact('items', 'title', 'producers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
