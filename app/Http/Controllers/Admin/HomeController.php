<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bill;
use App\Models\Item;
use DB;
use Charts;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Bill $bill, Item $item)
    {
        $dt = Carbon::now();
        $statistic_bill = Bill::select(DB::raw('SUM(total) as total, month(created_at) as date'))
                            ->groupBy(DB::raw("month(created_at)"))
                            ->get();
    
        $chart = Charts::create('bar', 'highcharts')
                  ->title('Thu nhập tiền theo tháng trong năm ' . $dt->year)
                  ->elementLabel('Đơn vị triệu')
                  ->labels($statistic_bill->pluck('date'))
                  ->values($statistic_bill->pluck('total'))
                  ->dimensions(0, 400);

        return view('pages.admin.home', compact('user', 'bill', 'item', 'chart'));
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
