<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function create()
    {
        return view('system.experience');
    }

    public function store(ExperienceRequest $request)
    {
        $validate = $request->validated();

        Experience::create([
            'organization_name' => $validate['organization_name'],
            'position' => $validate['position'],
            'job_description' => $validate['job_description'],
            'start_date' => $validate['start_date'],
            'end_date' => $validate['end_date'],
        ]);

        return redirect()->route('doctor.index')->with('success','Doctor Created Successfully');
    }
}
