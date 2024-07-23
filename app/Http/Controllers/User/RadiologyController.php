<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RadiologyController extends Controller
{
    public function index()
    {
     $radiology = Service::where('type', 'radiology')->first();
     $subService = SubService::where('service_id', $radiology->id)->get();
     $image = Gallery::where('type', 'radiology')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.radiology.index   ', compact('radiology', 'running_text', 'subService', 'image'));
    }
}
