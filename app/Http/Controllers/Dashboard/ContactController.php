<?php

namespace App\Http\Controllers\Dashboard;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function index()
    {
        if($this->auth->user_type == 2) {
            $data['contacts'] = Contact::with('user','details')
                ->where('parent_id',0)
                ->orderBy('id', 'desc')
                ->paginate(20);
        }else{
            $data['contacts'] = Contact::with('user','details')
                ->where('user_id', $this->auth->id)
                ->where('parent_id',0)
                ->orderBy('id', 'desc')
                ->paginate(20);
        }
        return view('dashboard.contact')->with($data);
    }


    public function show($id)
    {
        $data['contact'] = Contact::with('details.user')->find($id);
        return view('dashboard.contact_details')->with($data);
    }


    public function create()
    {
        if($this->auth->user_type == 2){
            $data['users'] = User::where('user_type', 1)->get();
            $data['admin_id'] = $this->auth->id;
        }else{
            $data['user_id'] = $this->auth->id;
            $data['admin_id'] = 0;
        }
        return view('dashboard.contact_create')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:250',
            'message' => 'required',
            'attach'  => 'nullable|mimes:jpeg,jpg,png,PNG,gif,doc,pdf|max:3000'
        ]);
        try {
            $contact = new Contact;
            $contact->user_id = $request->user_id;
            $contact->admin_id = $request->admin_id;
            $contact->subject = $request->subject;
            $contact->description = $request->message;
            if($request->hasFile('attach')){
                $image = time().'.'.$request->attach->extension();
                $upload = public_path('uploads/attachment');
                $request->attach->move($upload, $image);
                $contact->attach = $image;
            }
            $contact->save();
            $request->session()->flash('success', 'Your message has been send.');
            return redirect('contacts');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Your message not send.');
            return redirect()->back();
        }
    }


    public function edit()
    {
        return view('dashboard.contact');
    }


    public function update()
    {
        return view('dashboard.contact');
    }


    public function destroy(Request $request)
    {
        try{
            Contact::where('id', $request->id)->delete();
            Contact::where('parent_id', $request->id)->delete();
            $request->session()->flash('success', 'Contact message successfully delete.');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Contact message not delete.');
        }
        return redirect()->back();
    }


    public function replay(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'attach'  => 'nullable|mimes:jpeg,jpg,png,PNG,gif,doc,pdf|max:3000'
        ]);
        try{
            $contact = new Contact;
            $contact->user_id = $request->user_id;
            $contact->admin_id = $request->admin_id;
            $contact->parent_id = $request->id;
            $contact->description = $request->message;
            if($request->hasFile('attach')){
                $image = time().'.'.$request->attach->extension();
                $upload = public_path('uploads/attachment');
                $request->attach->move($upload, $image);
                $contact->attach = $image;
            }
            $contact->save();
            $request->session()->flash('success', 'Your replay has been send.');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Your replay not send.');
        }
        return redirect()->back();
    }



}
