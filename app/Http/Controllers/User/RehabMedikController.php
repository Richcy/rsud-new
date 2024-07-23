<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RehabMedikController extends Controller
{
    public function index()
    {
     $rehab_medik = Service::where('type', 'rehab_medik')->first();
     $subService = SubService::where('service_id', $rehab_medik->id)->get();
     $image = Gallery::where('type', 'rehab_medik')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.rehab_medik.index   ', compact('rehab_medik', 'running_text', 'subService', 'image'));
    }
}
