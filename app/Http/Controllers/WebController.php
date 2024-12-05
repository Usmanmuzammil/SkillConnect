<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AttendenceSheet;
use App\Models\Banner;
use App\Models\course;
use App\Models\Event;
use App\Models\Teacher;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $banner = Banner::get();
        $about = About::first();
        $teachers = Teacher::paginate(8);
        $courses = course::all();  // Fetch all courses from the database
        return view('webiste.home',compact('banner','about','teachers','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getTeachers()
    {
        $teachers = Teacher::get();
        return view('webiste.teachers',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getAbout()
    {
        $about = About::first();
        return view('webiste.about',compact('about'));
    }


    public function getCourses()
    {
        $courses = course::get();
        return view('webiste.courses',compact('courses'));
    }

    /**
     * Display the specified resource.
     */
    public function getContact()
    {
        return view('webiste.contact');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getAttendence()
    {
        $attendences = AttendenceSheet::latest()->get();
        return view('webiste.attendence',compact('attendences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function getEvent()
    {
        $events = Event::with('Media')->get();
        return view('webiste.blog',compact('events'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
