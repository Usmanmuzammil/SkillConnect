<?php

namespace App\Http\Controllers;

use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index',compact('about'));
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
            // Validating the input fields
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // If validation fails, return with errors
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            // Image Upload
            $imageName = null; // Default in case no image is uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');
    
                // Generate unique image name
                $imageName = time() . '.' . $image->getClientOriginalExtension();
    
                // Set path where the image should be uploaded
                $path = public_path('/upload_image');
    
                // Move image to the desired folder
                $image->move($path, $imageName);
    
                // Set image path to save in the database
                $imageName = '/upload_image/' . $imageName;
            }
    
            // Save the About record in the database
            About::where('id', 1)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName, // If no image is uploaded, this will be null
            ]);
    
            return back()->with('success', 'About section successfully added!');
    
        } catch (Exception $ex) {
            // In case of any error, return with error message
            return back()->with('danger', 'Error: ' . $ex->getMessage());
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
    public function destroy(string $id)
    {
        //
    }
}
