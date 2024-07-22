<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QualityController extends Controller
{
    public function index()
    {
        $running_text = RunningText::first();
        $quality = ImageProfile::where('type', 'quality')->first();

        return view('user.quality.index', compact('running_text', 'quality'));
    }
}
