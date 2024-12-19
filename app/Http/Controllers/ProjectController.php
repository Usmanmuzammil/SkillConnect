<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectModel::select('*');
    
            return DataTables::of($data)
                ->editColumn('Image', function ($row) {
                    return '<img class="img-thumbnail" alt="PDF Image" width="100" src="' . $row->image . '">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.project.action_modal', compact('data'));
                })
            ->rawColumns([ 'action', 'Image','UploadedBy']) // Specify fields that contain HTML
                ->make(true);
        }
    
        return view('admin.project.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    // Validate the input
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'required',
        'whatsapp_num' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 400);
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('/upload_images');
        $image->move($path, $imageName);
    }
    // Retrieve the validated data
    $validatedData = $validator->validated();

        // Add the status field
        $validatedData['status'] = 1;
        $validatedData['image'] = '/upload_images/'.$imageName;


    // Create the project record
    ProjectModel::create($validatedData);

    return redirect()->back()->with('success','Project Added Successfully');
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
    public function destroy(string $id)
    {
        //
    }
}
