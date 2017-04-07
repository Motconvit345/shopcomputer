<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use Auth;
use Validator;
use Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $bills = Auth::user()->bills()->orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.web.customer.home', compact('bills'));
    }

    public function editCustomer()
    {
        return view('pages.web.customer.editCustomer');
    }

    public function update(Request $request)
    {
        $msg = [];
        $user = Auth::user();
        $user->fill($request->all());
        if ($user->save()) {
            $msg['status'] = 'success';
            $msg['notification'] = 'Cập nhật thành công';
        } else {
            $msg['status'] = 'danger';
            $msg['notification'] = 'Cập nhật không thành công';
        }

        return redirect()->action('CustomerController@index')->with('status', $msg);
    }

    public function indexChangePassword()
    {
        return view('pages.web.customer.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:40|confirmed',
        ], [
            'password.confirmed' => 'Password xác nhận không chính xác',
            'password.min' => 'Mật khẩu ít nhất phải có 6 kí tự',
        ]);

        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            $msg['status'] = 'danger';
            $msg['notification'] = 'Cập nhật không thành công';
            return redirect()->back()->with('status', [
                'status' => 'danger',
                'notification' => 'Password không chính xác'
            ]);
        }

        $user = Auth::user();
        $user->fill($request->only('password'));
        $user->save();

        return redirect()->action('CustomerController@index')->with('status', [
            'status' => 'success',
            'notification' => 'Cập nhật mật khẩu thành công'
        ]);
    }

    public function historyOrder()
    {
        //
    }

    public function orderDetail($id)
    {
        $bill = Bill::find($id);
        return view('pages.web.customer.order.orderDetail', compact('bill'));
    }
}
