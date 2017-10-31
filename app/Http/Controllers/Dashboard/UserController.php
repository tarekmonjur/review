<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function index()
    {
        $data['users'] = User::paginate(15);
        return view('dashboard.users')->with($data);
    }


    public function showProfile()
    {
        $data['user'] = User::find($this->auth->id);
        return view('dashboard.profile')->with($data);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:100|unique:users,id,'.$request->id,
            'password' => 'nullable|string|min:6|max:50',
            'confirm_password' => 'nullable|string|min:6|max:50|same:password',
        ]);

        try{
            $user = User::find($request->id);
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->mobile_no = $request->mobile_no;
            $user->company_name = $request->company_name;
            $user->about = $request->about;
            if($request->has('password') && $request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();

            $request->session()->flash('success','Profile successfully updated.');
        }catch (\Exception $e){
            $request->session()->flash('error','Sorry! Profile not updated.');
        }
        return redirect()->back();
    }

}
