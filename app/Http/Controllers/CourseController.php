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
                ->editColumn('pdf', function ($row) {
                    // Return the link to the PDF
                    return '<a href="'.$row->pdf.'" target="_blank">View PDF</a>';
                })
                ->editColumn('PDFImage', function ($row) {
                    // return '<div class="image-container">
                    //         <img src="'.$row->pdf_image.'" alt="Image" width="90px" >                
                    // </div>';
                    return '<img class="img-thumbnail" alt="200x200" width="100" src="'.$row->pdf_image.'">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.course.action_modal', compact('data'));
                })
                ->rawColumns(['pdf', 'action','PDFImage']) // Make sure 'pdf' is processed as HTML
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
                'pdf' => 'required',
                'pdf_image'=>'required',
            ]);

            if ($request->hasFile('pdf')) {
                $pdf = $request->file('pdf');
                $pdfName = time().'.'.$pdf->getClientOriginalExtension();
                $path = public_path('/upload_pdfs');
                $pdf->move($path, $pdfName);
            }
            
            if ($request->hasFile('pdf_image')) {
                $pdf_image = $request->file('pdf_image');
                $pdf_imageName = time().'.'.$pdf_image->getClientOriginalExtension();
                $path = public_path('/upload_images');
                $pdf_image->move($path, $pdf_imageName);
            }
            course::create([
                'course_title' => $request->course_title,
                'pdf' => '/upload_pdfs/'.$pdfName,
                'pdf_image' => '/upload_images/'.$pdf_imageName,
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
