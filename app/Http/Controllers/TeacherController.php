<?php

namespace App\Http\Controllers;

use App\Mail\Mail\FacultyRegistration;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Teacher::select('*');

            return DataTables::of($data)
            ->addColumn('actions',function ($row) {
                $statusText = ($row->status == 1) ? 'Active' : 'InActive';
                $badgeClass = ($row->status == 1) ? 'success' : 'danger';
                return '<td>
                       <span class="badge bg-'.$badgeClass.'">'.$statusText.'</span>
                </td>';
            })
            ->editColumn('image', function ($row) {
                // return '<div class="image-container">
                //         <img src="'.$row->image.'" alt="Image" style="width: 100px; height: 100px;border-radius: 50%;">                
                // </div>';
                return '<img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="' . $row->image . '" />';

            })
            ->addColumn('status', function ($row) {
                $statusText = ($row->status == 200) ? 'Enable' : 'Disable';
                $btnClass = ($row->status == 200) ? 'success' : 'danger';
                return '<span class="badge bg-' . $btnClass . '">' . $statusText . '</span>';
            })
            
                ->addColumn('actions', function ($data){
                    return view('admin.teacher.action_modal',compact('data'));

                })
                ->rawColumns(['actions','image','status'])
                ->make(true);
        }

        return view('admin.teacher.index');
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
                'name' => 'required',
                'email' => 'required',
                'desgination' => 'required',
                'description' => 'required',
                'youtube_link' => 'nullable',
                'facebook_link' => 'nullable',
                'twitter_link' => 'nullable',
                'image' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_image');
                $image->move($path, $imageName);
            }
            Teacher::create([
                'name' => $request->name,
                'email' => $request->email,
                'desgination' => $request->desgination,
                'description' => $request->description,
                'youtube_link' => 'https://www.youtube.com/embed/VIDEO_ID',
                'facebook_link' => 'https://www.facebook.com/yourpage/posts/123456789',
                'twitter_link' =>' https://www.twitter.com/yourpage/posts/123456789',
                'image' => '/upload_image/'.$imageName,
            ]);

            Mail::to($request->email)->send(new FacultyRegistration($request->name,$request->email,$request->desgination));

            return back()->with(['success' => 'Faculty Added Successfully!']);

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
    public function destroy(string $id)
    {
        try {
            
            $teacher = Teacher::findOrFail($id)->delete();
            if ($teacher) {
                return back()->with(['danger' => 'Teacher Deleted Successfully!']);
            } else {
                return back()->with(['success' => 'Teacher Id is not found!']);
            }
        } catch (Exception $ex) {
            return back()->with(['danger' => $ex->getMessage()]);
        }
    }
}
