<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::select('*');
    
            return DataTables::of($data)
                ->editColumn('link', function ($row) {
                    return '<a href="'.$row->link.'" target="_blank">View Video</a>';
                })
                ->addColumn('status', function ($row) {
                    $statusText = ($row->status == 200) ? 'Enable' : 'Disable';
                    $btnClass = ($row->status == 200) ? 'success' : 'danger';
                    return '<span class="badge bg-' . $btnClass . '">' . $statusText . '</span>';
                })
                ->editColumn('image', function ($row) {
                    // return '<div class="image-container">
                    //         <img src="'.$row->image.'" alt="Image" width="60px" >                
                    // </div>';
                    return '<img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="' . $row->image . '" />';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.blog.action_modal', compact('data'));
                })
                ->rawColumns(['link', 'action','image','status']) // Make sure 'pdf' is processed as HTML
                ->make(true);
        }
    
        return view('admin.blog.index');
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
                'title' => 'required',
                'image' => 'required',
                'link'=>'required',
            ]);
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_images');
                $image->move($path, $imageName);
            }
            Blog::create([
                'title' => $request->title,
                'image' => '/upload_images/'.$imageName,
                'link' => $request->link,

            ]);

            return back()->with(['success' => 'Blog Added Successfully!']);

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
        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Delete the blog (also handle any associated files if necessary)
        $blog->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['danger' => 'Blog deleted successfully']);
    }
}
