<?php

namespace App\Http\Controllers;

use App\Models\course;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::select('*');
    
            return DataTables::of($data)
                ->editColumn('Image', function ($row) {
                    return '<img class="img-thumbnail" alt="PDF Image" width="100" src="' . $row->image . '">';
                })
                ->editColumn('Duration', function ($row) {
                    // Convert duration from minutes to HH:MM format
                    $hours = floor($row->duration / 60);
                    $minutes = $row->duration % 60;
                    return sprintf('%02d:%02d', $hours, $minutes); // Format as HH:MM
                })
                ->addColumn('action', function ($data) {
                    return view('admin.course.action_modal', compact('data'));
                })
                ->rawColumns([ 'action', 'Image','Duration']) // Specify fields that contain HTML
                ->make(true);
        }
    
        return view('admin.course.index');
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = Validator::make($request->all(),[
                'course_title' => 'required',
                'image' => 'required',
                'link'=>'required',
                'price'=>'required',
                'hours' => 'required|integer|min:0',
                'minutes' => 'required|integer|min:0|max:59',
                'whatsapp_num' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_images');
                $image->move($path, $imageName);
            }
            $totalMinutes = ($request->hours * 60) + $request->minutes;

            course::create([
                'course_title' => $request->course_title,
                'link' => $request->link,
                'price' => $request->price,
                'duration' => $totalMinutes,
                'whatsapp_num' => $request->whatsapp_num,
                'image' => '/upload_images/'.$imageName,
            ]);

            return back()->with(['success' => 'Course Added Successfully!']);

        } catch (Exception $ex) {
            return back()->with(['danger' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the course by ID
        $course = course::findOrFail($id);

        // Delete the course (also handle any associated files if necessary)
        $course->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['success' => 'Course deleted successfully']);
    }
}
