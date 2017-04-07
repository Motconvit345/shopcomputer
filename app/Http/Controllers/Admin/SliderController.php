<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Item;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('pages.admin.slider.listSlider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.slider.addSlider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Xóa order nếu có trc đó
        Slider::where('order', $request->order)->update(['order' => 10]);

        $slider = new Slider;
        //Save
        $slider->order = $request->order;
        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('image/slider/', $fileName);
            $slider->image = $fileName;
        }
        $slider->description = $request->description;
        $slider->save();

        return redirect()->action('Admin\SliderController@index')->with('status', 'Thêm thành công');
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
        $slider = Slider::find($id);
        return view('pages.admin.slider.editSlider', compact('slider'));
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
        $slider = Slider::find($id);
        $slider->order = $request->order;
        File::delete('image/slider/' . $slider->image);
        if ($request->hasFile('fImages')) {
            $file = $request->fImages;
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('image/slider/', $fileName);
            $slider->image = $fileName;
        }
        $slider->description = $request->description;
        $slider->save();

        return redirect()->action('Admin\SliderController@index')->with('status', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        File::delete('image/slider/' . $slider->image);
        Slider::destroy($id);
    }
}
