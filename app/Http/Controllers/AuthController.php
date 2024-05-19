<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\sendMail;
use Mail;


class AuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('branch', 'department', 'employee')
            ->get();
        return ['users' => $users];
    }

    public function loginForm()
    {


        return view('authentication.authentication-signin');
    }

    public function register()
    {


        return view('authentication.authentication-signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:5|max:255',
            'phone_no' => 'required|min:11|max:11',

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = 1;
            $user->password = Hash::make($request->password);
            $user->phone_no = $request->phone_no;
            $user->save();
            return redirect('/')->with(['status' => 'success', 'message' => 'Your account has been created successfully']);
        } catch (Exception $e) {
            return back()->withInput()->with(['status' => 'danger', 'message' => $e->getMessage()]);
        }
    }


    public function adminlogin(Request $request)
    {




        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::attempt($credentials)) {

            $user = User::where('email', $request->email)->with('role')->first();
            Session::put('user_id', $user->id);
            Session::put('role_id', $user->role_id);
            Session::put('name', $user->name);



            return redirect()->route('admin-dashboard')->with(['status' => 'success', 'message' => 'Welcome..! ' . $user->name]);
        }

        return redirect()->back()->with(['status' => 'danger', 'message' => 'Wrong Credentials']);

    }


    public function logout()
    {
        session()->flush();
        return redirect()->to('/login');
    }
}
