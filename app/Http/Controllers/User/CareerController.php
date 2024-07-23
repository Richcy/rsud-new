<?php

namespace App\Http\Controllers\User;

use App\Models\Career;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $running_text = RunningText::first();
        $search = $request->input('title');
        $careers = Career::where('status', 1)
        ->where(function($query) use ($search) {
            if (!empty($search)) {
                $query->where('title', 'like', '%' . $search . '%');
            }
        })
        ->orderBy('created_at', 'asc')
        ->paginate(8);
        return view('user.career.index', compact('running_text', 'careers'));
    }

    public function show($slug)
    {
        $running_text = RunningText::first();
        $career = Career::where('slug', $slug)->first();
        $otherCareer = Career::where('status',1)->whereNot('slug', $slug)->orderBy('created_at', 'asc')->limit(3)->get();
        return view('user.career.show', compact('running_text', 'career', 'otherCareer'));
    }
}
