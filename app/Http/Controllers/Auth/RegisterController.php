<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ConfirmPass;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)*/
    protected function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $confirmation_code = time().uniqid(true);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0,
            'role_id' => 4,
        ]);
        
        Mail::to($request->email)->send(new ConfirmPass($confirmation_code));

        return redirect()->action('Auth\RegisterController@notification', '58d95c18f252c');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update([
                'confirmed' => 1,
                'confirmation_code' => null
            ]);
            $notification_status = '58d95c35c029d';
        } else {
            $notification_status ='58d95c3f2f340';
        }

        return redirect()->action('Auth\RegisterController@notification', $notification_status);
    }

    public function notification($status)
    {
        $notification = '';
        switch ($status) {
            case '58d95c18f252c':
                $notification = 'Bạn đã đăng kí thành công, vào email để xác nhận';
                break;
            case '58d95c35c029d':
                $notification = 'Bạn đã xác nhận thành công';
                break;
            case '58d95c3f2f340':
                $notification = 'Mã xác nhận không chính xác';
                break;
        }
        return view('auth.confirm_pass', ['status' => $notification]);
    }
}
