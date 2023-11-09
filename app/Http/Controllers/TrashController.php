<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('system.trash.doctor',compact('doctors'));
    }

    public function restore($id){
        $doctor = Doctor::onlyTrashed()->find($id);
        if($doctor){
            $doctor->restore();

        }
        return redirect()->route('trash.index')->with('success','Doctor Restored Successfully');

    }

    public function destroy($id)
    {
        $doctor = Doctor::onlyTrashed()->find($id);
        if($doctor){
            $doctor->forceDelete();
        }

        return redirect()->route('trash.index')->with('success','Doctor Deleted Successfully');
    }
}
