<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HemodialisisController extends Controller
{
    public function index()
    {
     $hemodilisis = Service::where('type', 'hemodialis')->first();
     $subService = SubService::where('service_id', $hemodilisis->id)->get();
     $image = Gallery::where('type', 'hemodialis')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.hemodialisis.index   ', compact('hemodilisis', 'running_text', 'subService', 'image'));
    }
}
