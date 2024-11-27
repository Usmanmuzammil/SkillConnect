<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::select('*');
            return DataTables::of($data)
            ->editColumn('image', function ($row) {
                return '<div class="image-container">
                        <img src="'.$row->image.'" alt="Image"width="90px" >                
                </div>';
            })
            ->addColumn('action', function ($data){
                return view('admin.banner.action_modal',compact('data'));
                
            })
                ->rawColumns(['image','action'])
                ->make(true);
        }

        return view('admin.banner.index');
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
                'tagline' => 'required',
                'description' => 'required',
                'image' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_image');
                $image->move($path, $imageName);
            }
            Banner::create([
                'tagline' => $request->tagline,
                'description' => $request->description,
                'image' => '/upload_image/'.$imageName,
            ]);

            return back()->with(['success' => 'Banner Added Successfully!']);

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
        // Find the banner by ID
        $banner = Banner::findOrFail($id);

        // Delete the banner (also handle any associated files if necessary)
        $banner->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['success' => 'Banner deleted successfully']);
    }
}
