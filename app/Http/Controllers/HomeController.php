<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\Slider;

class HomeController extends Controller
{
    use Searchable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_id_laptop = Category::where('name', 'Laptop')->first();
        $ItemLaptop = Item::whereIn('category_id', get_category_id($category_id_laptop->id))->limit(12)->get();

        $category_id_pc = Category::where('name', 'PC')->first();
        $ItemPC = Item::whereIn('category_id', get_category_id($category_id_pc->id))->limit(12)->get();
        $categories = Category::all();

        $sliders= Slider::orderBy('order')->take(3)->get();

        return view('pages.web.home', compact('ItemPC', 'ItemLaptop', 'categories', 'sliders'));
    }

    public function search(Request $request)
    {
        $textSearch = $request->textSearch;
        $items = Item::where('name', 'LIKE', '%'.$textSearch.'%')->select('id', 'name', 'price')->limit(5)->get();
        return view('ajax.search', compact('items'));
    }
}
