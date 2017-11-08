<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/reviews/show';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
    }

    public function verifyEmail(Request $request)
    {
        if($request->token) {
            $user_id = base64_decode($request->token);
            $result = User::where('id', $user_id)->where('email_verify', 0)->update(['email_verify' => 1]);
            if ($result) {
                $request->session()->flash('success', "Your account successfully verified.<br> Thank you for the activation and go to finish your profile.");
            }
            return view('auth.signup_complete');
        }else{
            return redirect('signup');
        }
    }
}
