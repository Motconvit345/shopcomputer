<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => 1
        ];


        if (User::where('email', $request->email)->where('confirmed', 1)->count() < 1)
        {
             return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Tài khoản chưa được kích hoạt'
                    ]);
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Tài khoản không đúng hoặc chưa được kích hoạt'
                    ]);
        }
        
        return redirect('/');
    }
}
