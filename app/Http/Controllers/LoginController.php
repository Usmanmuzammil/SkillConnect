<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validate;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    public function facultyIndex()
    {
        return view('faculty.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records']);

    }


    public function facultyLogin(Request $request)
    {
        $credentials = $request->only(['email','password']);
        if (Auth::guard('faculty')->attempt($request->only(['email','password']),$request->get('remember'))) {
            return redirect()->intended('/profile_update/view');
        }
        return back()->withInput($request->only('email','remember'))->withErrors(['email' => 'These credentials do not match our records!']);
    }

    public function profile_update_view()
    {
        return view('admin.settings.profile_update');
    }

    public function faculty_profile_update_view()
    {
        return view('faculty.settings.profile_update_view');
    }

    public function faculty_profile_update_edit()
    {
        return view('faculty.settings.profile_edit');
    }

    public function logout()  {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }

    public function facultyLogout()  {
        Auth::guard(name: 'faculty')->logout();
        return redirect('/faculty/login');
    }

    public function update_profile(Request $request){

        $data = $request->validate([
            'email'   => 'email',
            'password' => 'min:6'
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($password == "") {
            Admin::where('id', Auth::user()->id)->update(['email' => $email]);
            Auth::guard('admin')->logout();
        } else {
            Admin::where('id', Auth::user()->id)->update(['email' => $email, 'password' => Hash::make($password)]);
            Auth::guard('admin')->logout();
        }

        return redirect('/login')->with(['success'=> 'Your data is updated successfully. Now you have to Login!']);

    }
}
