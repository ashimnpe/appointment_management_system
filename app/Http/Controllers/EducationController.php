<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function create()
    {
        return view('system.education');
    }

    public function store(EducationRequest $request)
    {
        $validate = $request->validated();

        Education::create([
            'institution' => $validate['institution'],
            'level' => $validate['level'],
            'board' => $validate['board'],
            'marks' => $validate['marks'],
            'start_date' => $validate['start_date'],
            'end_date' => $validate['end_date'],
        ]);

        return redirect()->route('experience.create');
    }
}
