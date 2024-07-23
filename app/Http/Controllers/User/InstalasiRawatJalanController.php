<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstalasiRawatJalanController extends Controller
{
   public function index()
   {
    $rawatJalan = Service::where('type', 'irj')->first();
    $subService = SubService::where('service_id', $rawatJalan->id)->get();
    $image = Gallery::where('type', 'irj')->orderBy('sort', 'asc')->get();
    $running_text = RunningText::first();
    return view('user.rawat_jalan.index', compact('rawatJalan', 'running_text', 'subService', 'image'));
   }
}
