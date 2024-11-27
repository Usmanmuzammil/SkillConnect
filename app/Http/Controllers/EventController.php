<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ImageMedia;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::select('*');
    
            return DataTables::of($data)
                ->editColumn('image', function ($row) {
                    return '<div class="image-container">
                            <img src="'.$row->image.'" alt="Image" width="60px" >                
                    </div>';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.event.action_modal', compact('data'));
                })
                ->rawColumns(['action','image']) // Make sure 'pdf' is processed as HTML
                ->make(true);
        }
    
        return view('admin.event.index');
    }
    public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable|array', // Ensure it's an array
            'images.*' => 'mimes:jpg,jpeg,png|max:2048000', // Accept image files (up to 20 MB)
        ]);
    
        // Create event record
        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description'); // Store description
        $event->save(); // Save event details
    
        // Handle image file uploads
        if ($request->hasFile('images')) {
            // Iterate over all uploaded images and save them
            foreach ($request->file('images') as $file) {
                // Generate a unique file name for each uploaded image
                $imageName = time() . '_' . $file->getClientOriginalName();
                $path = public_path('/upload_images'); // Folder where images will be stored
    
                // Move the image to the public folder
                $file->move($path, $imageName);
    
                // Create ImageMedia record for each uploaded image
                ImageMedia::create([
                    'event_id' => $event->id, // Link the image to the event
                    'path' => '/upload_images/' . $imageName, // Store the image path relative to public directory
                ]);
            }
        }
    
        // Return success response or redirect with success message
        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    public function show($id)
    {
        // Fetch the event by its ID
        $event = Event::with('media')->find($id);  // This won't throw an exception if the event doesn't exist
    
        // If the event is not found, you can handle it by redirecting or showing an error
        if (!$event) {
            return redirect()->route('events');
        }
    
        // Return a view with the event data
        return view('webiste.event_details', compact('event'));
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
        $event = Event::findOrFail($id);

        // Delete the event (also handle any associated files if necessary)
        $event->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['danger' => 'Event deleted successfully']);
    }
}
