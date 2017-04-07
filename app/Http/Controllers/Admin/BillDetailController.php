<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillDetail;
use App\Models\Bill;

class BillDetailController extends Controller
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
        $billDetail = BillDetail::find($request->id);
        $bill = $billDetail->bill;
        //Giá mới chi tiết hóa đơn hiện tại
        $totalbillDetail = $billDetail->item->price * $request->quantity;
        //TỔng tiền hóa đơn mới, S_billOld  - S_billDetailOld + S_billDetailnew
        $newTotal = $bill->total - ($billDetail->item->price * $billDetail->quality) + $totalbillDetail;
        $billDetail->fill([
            'quality' => $request->quantity,
            'total' => $totalbillDetail
        ]);
        $billDetail->save();
        //Cập nhật lại tổng giá hóa đơn
        $bill->fill([
            'total' => $newTotal
        ]);
        $bill->save();
        return response()->json([number_format($totalbillDetail), number_format($newTotal)]);
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
        $billDetail = BillDetail::find($id);
        $bill = $billDetail->bill;
        $newTotal = $bill->total - ($billDetail->item->price * $billDetail->quality);
        $billDetail->delete();
        $bill->fill([
            'total' => $newTotal
        ]);
        $bill->save();
        return number_format($newTotal);
    }
}
