<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananUnggulanController extends Controller
{
    public function index()
    {
        $unggulan = Service::where('type', 'unggulan')->first();
        $subService = SubService::where('service_id', $unggulan->id)->get();
        $image = Gallery::where('type', 'unggulan')->orderBy('sort', 'asc')->get();
        $running_text = RunningText::first();
        return view('user.layanan_unggulan.index', compact('unggulan', 'running_text', 'subService', 'image'));
    }
}
