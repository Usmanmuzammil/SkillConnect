<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validate;
use Validator;

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

    
    public function facultySignUp()
    {
        return view('faculty.auth.signup');
    }

     // This method stores the data in the session

     public function submitFacultySignup(Request $request)
     {
        // return $request->all();
         // Validate the form data
         $validated = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:teachers,email', // Ensure to check in the correct table (teachers in this case)
             'password' => 'required|string|min:8|confirmed',
             'category' => 'required|string|max:255', // Freelancer category or department
             'country' => 'required|string|max:100', // Country field
             'year_of_experience' => 'required|integer|min:0', // Positive integer for experience
             'facebook_link' => 'nullable|url',
             'twitter_link' => 'nullable|url',
             'youtube_link' => 'nullable|url',
             'description' => 'nullable|string',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
         ]);
     
         // Handle the profile image upload
         $imageName = '';
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '.' . $image->getClientOriginalExtension();
             $path = public_path('/upload_images');
             $image->move($path, $imageName);
         }
     
         try {
             // Store teacher/freelancer data
             $teacher = new Teacher();
             $teacher->name = $request->input('name');
             $teacher->email = $request->input('email');
             $teacher->password = Hash::make($request->input('password')); // Encrypt password
             $teacher->category = $request->input('category'); // Freelancer category (or department)
             $teacher->country = $request->input('country'); // Country of freelancer
             $teacher->year_of_experience = $request->input('year_of_experience'); // Experience in years
             $teacher->facebook_link = $request->input('facebook_link');
             $teacher->twitter_link = $request->input('twitter_link');
             $teacher->youtube_link = $request->input('youtube_link');
             $teacher->description = $request->input('description');
             
             // Save the uploaded image path if it exists
             if ($imageName) {
                 $teacher->image = '/upload_images/' . $imageName;
             }
     
             // Save the teacher record
             $teacher->save();
     
             // Redirect to login page with success message
             return redirect()->to('/faculty/login')->with('success', 'Your freelancer account has been created successfully!');
         } catch (Exception $e) {
             // Return with error message if any exception occurs
             return back()->withErrors(['error' => $e->getMessage()]);
         }
     }
     
     
}
