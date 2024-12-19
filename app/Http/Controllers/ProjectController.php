<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\User;
use Illuminate\Http\Request;
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
                ->editColumn('UploadedBy', function ($row) {
                    return User::find($row->created_by)->username;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
