<?php

namespace App\Http\Controllers;

use App\Models\AttendenceSheet;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\DataTables;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AttendenceSheet::select('*');
    
            return DataTables::of($data)
                ->editColumn('image', function ($row) {
                    // return '<div class="image-container">
                    //         <img src="'.$row->image.'" alt="Image" width="60px" >                
                    // </div>';
                    return '<img class="img-thumbnail" alt="200x200" width="100" height="100px" src="'.$row->image.'">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.attendence.action_modal', compact('data'));
                })
                ->rawColumns(['action','image']) // Make sure 'pdf' is processed as HTML
                ->make(true);
        }
    
        return view('admin.attendence.index');
    }

    public function store(Request $request)
    {
        try {
            $data = Validator::make($request->all(),[
                'title' => 'required',
                'department' => 'required',
                'image'=>'required',
            ]);
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_images');
                $image->move($path, $imageName);
            }
            AttendenceSheet::create([
                'title' => $request->title,
                'department' => $request->department,
                'image' => '/upload_images/'.$imageName,
            ]);

            return back()->with(['success' => 'Attendence Added Successfully!']);

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

    public function destroy($id)
    {
        // Find the Attendence by ID
        $Attendence = AttendenceSheet::findOrFail($id);

        // Delete the Attendence (also handle any associated files if necessary)
        $Attendence->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['danger' => 'Attendence deleted successfully']);
    }
}
