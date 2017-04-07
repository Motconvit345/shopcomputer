<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Auth;
use Mail;
use App\Mail\ConfirmPass;

class UserController extends Controller
{
    /**
     * Display a listing of the admin
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryModel =  new Category;
        $role_user = Role::where('name', '<>', 'member')->get();
        if (isset($request->role_id)) {
            $users = User::where('id', '!=', Auth::id())->where('role_id', '<>', 4)->where('role_id', $request->role_id)->get();
        } else {
             $users = User::where('id', '!=', Auth::id())->where('role_id', '<>', 4)->get();
        }

        return view('pages.admin.user.userList', compact('users', 'role_user', 'categoryModel'));
    }

    /**
    **
     * Display a listing of the member
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMember()
    {
        $users = User::where('role_id', 4)->get();
        return view('pages.admin.user.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.admin.user.userAdd', compact('roles'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
        $confirmation_code = time().uniqid(true);
        $defaultPass = uniqid(true);
        $user = new User;
        $user->name = $request->name;
        $user->password = $defaultPass;
        $user->email = $request->email;
        $user->confirmation_code = $confirmation_code;
        $user->role_id = $request->role;
        $user->save();

        Mail::to($request->email)->send(new ConfirmPass($confirmation_code, $defaultPass));

        return redirect()->action('Admin\UserController@index')->with('status', 'Thêm thành công tài khoản');
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
        $user = User::find($id);
        return view('pages.admin.user.userEdit', compact('user'));
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
            'name' => 'required|max:255',
            'email' => 'required|max:255|',
            'password' => '|min:6',
            'phone' => 'alpha_num|min:9|max:11'
        ]);
        $password = $request->password;
        $user = User::find($id);
        $user->address = $request->address;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($password) {
            $user->password = $password;
        }
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->action('Admin\UserController@index')->with('status', 'Xóa thành công User');
    }
}
