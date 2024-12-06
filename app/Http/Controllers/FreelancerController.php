<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Teacher::select('*');

            return DataTables::of($data)
            ->addColumn('status',function ($row) {
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
                return '<img class="img-thumbnail rounded-circle avatar-xxl" alt="200x200" src="' . $row->image . '" />';

            })
            
                ->addColumn('actions', function ($data){
                    return view('admin.freelancer.action_modal',compact('data'));

                })
                ->rawColumns(['actions','image','status'])
                ->make(true);
        }

        return view('admin.freelancer.index');
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
        try {
            
            $teacher = Teacher::findOrFail($id)->delete();
            if ($teacher) {
                return back()->with(['danger' => 'Freelancer Deleted Successfully!']);
            } else {
                return back()->with(['success' => 'Freelancer Id is not found!']);
            }
        } catch (Exception $ex) {
            return back()->with(['danger' => $ex->getMessage()]);
        }
    }
}
