<?php

namespace App\Service\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $data['title'] = 'Form Registrazione - Opinion Software';
        return view('auth.register')->with($data);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if($request->has('signup')) {
            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);
            $request->session()->flash('success','Account creato con successo!');
            return $this->registered($request, $user)
                ?: redirect($this->redirectTo);
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if($request->ajax()){
            $data['status'] = 'success';
            $data['statusType'] = 'Ok';
            $data['code'] = 200;
            $data['title'] = 'Success!';
            $data['message'] = 'Account Successfully Created!';
            return response()->json($data,200);
        }
    }
}
