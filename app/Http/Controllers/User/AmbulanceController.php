<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmbulanceController extends Controller
{
    public function index()
    {
     $ambulance = Service::where('type', 'ambulance')->first();
     $subService = SubService::where('service_id', $ambulance->id)->get();
     $image = Gallery::where('type', 'ambulance')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.ambulance.index   ', compact('ambulance', 'running_text', 'subService', 'image'));
    }
}
