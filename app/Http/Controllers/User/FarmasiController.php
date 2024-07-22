<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmasiController extends Controller
{
    public function index()
    {
     $farmasi = Service::where('type', 'farmasi')->first();
     $subService = SubService::where('service_id', $farmasi->id)->get();
     $image = Gallery::where('type', 'farmasi')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.farmasi.index   ', compact('farmasi', 'running_text', 'subService', 'image'));
    }
}
