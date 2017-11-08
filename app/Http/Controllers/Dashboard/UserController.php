<?php

namespace App\Http\Controllers\Dashboard;

use App\Review;
use App\Setting;
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
        $data['users'] = User::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.users')->with($data);
    }


    public function create()
    {
        return view('dashboard.user_create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'nullable|string|min:6|max:50',
            'confirm_password' => 'nullable|string|min:6|max:50|same:password',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:3000',
            'mobile_no' => 'required|min:10|max:13',
        ]);

        try{
            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->mobile_no = $request->mobile_no;
            $user->company_name = $request->company_name;
            $user->about = $request->about;
            if($request->has('password') && $request->password){
                $user->password = bcrypt($request->password);
            }

            if($request->hasFile('photo')){
                $image = time().'.'.$request->photo->extension();
                $upload = public_path('uploads/');
                $request->photo->move($upload, $image);
                $user->photo = $image;
            }

            $user->save();

            $request->session()->flash('success','User successfully create.');
        }catch (\Exception $e){
            $request->session()->flash('error','Sorry! User not create.');
        }
        return redirect()->back();
    }


    public function show($id)
    {
        $data['user'] = User::find($id);
        return view('dashboard.user_edit')->with($data);
    }


    public function update(Request $request)
    {
        if($this->auth->user_type != 2){
            $request->session()->flash('error', 'You can not access.');
        }

        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:100|unique:users,id,'.$request->id,
            'password' => 'nullable|string|min:6|max:50',
            'confirm_password' => 'nullable|string|min:6|max:50|same:password',
            'user_type' => 'required',
            'mobile_no' => 'required|min:10|max:13',
        ]);

        try{
            $user = User::find($request->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->mobile_no = $request->mobile_no;
            $user->company_name = $request->company_name;
            $user->about = $request->about;
            $user->user_type = $request->user_type;
            if($request->has('password') && $request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();

            $request->session()->flash('success','User successfully updated.');
        }catch (\Exception $e){
            $request->session()->flash('error','Sorry! User not updated.');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        try{
            User::where('id', $request->id)->delete();
            Review::where('user_id', $request->id)->delete();
            $request->session()->flash('success','User successfully deleted.');
        }catch (\Exception $e){
            $request->session()->flash('error','Sorry! User not deleted.');
        }
        return redirect()->back();
    }


    public function showProfile()
    {
        $data['user'] = User::with('setting')->find($this->auth->id);
        return view('dashboard.profile')->with($data);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:100|unique:users,id,'.$request->id,
            'password' => 'nullable|string|min:6|max:50',
            'confirm_password' => 'nullable|string|min:6|max:50|same:password',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:3000',
            'mobile_no' => 'required|min:10|max:13',
        ]);

        try{
            $user = User::find($request->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->mobile_no = $request->mobile_no;
            $user->company_name = $request->company_name;
            $user->about = $request->about;
            if($request->has('password') && $request->password){
                $user->password = bcrypt($request->password);
            }

            if($request->hasFile('photo')){
                $image = time().'.'.$request->photo->extension();
                $upload = public_path('uploads/');
                $request->photo->move($upload, $image);
                $user->photo = $image;
            }

            $user->save();

            if($setting = Setting::where('user_id', $user->id)->first()){
                $settings = $setting;
            }else{
                $settings = new Setting;
            }

            $settings->user_id = $user->id;
            $settings->first_name = isset($request->first_name_privacy)?:0;
            $settings->last_name = isset($request->last_name_privacy)?:0;
            $settings->email = isset($request->email_privacy)?:0;
            $settings->gender = isset($request->gender_privacy)?:0;
            $settings->mobile_no = isset($request->mobile_no_privacy)?:0;
            $settings->photo = isset($request->photo_privacy)?:0;
            $settings->company = isset($request->company_name_privacy)?:0;
            $settings->save();

            $request->session()->flash('success','Profile successfully updated.');
        }catch (\Exception $e){
            $request->session()->flash('error','Sorry! Profile not updated.');
        }
        return redirect()->back();
    }

}
