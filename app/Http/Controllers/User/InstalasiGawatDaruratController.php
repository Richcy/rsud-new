<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstalasiGawatDaruratController extends Controller
{
    public function index()
    {
     $gawatDarurat = Service::where('type', 'igd')->first();
     $subService = SubService::where('service_id', $gawatDarurat->id)->get();
     $image = Gallery::where('type', 'igd')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.gawat_darurat.index', compact('gawatDarurat', 'running_text', 'subService', 'image'));
    }
}
