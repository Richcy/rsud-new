<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SketchController extends Controller
{
    public function index()
    {
        $sketch = ImageProfile::where('type', 'sketch')->first();
        $running_text = RunningText::first();
        return view('user.sketch.index', compact('sketch', 'running_text'));
    }
}
