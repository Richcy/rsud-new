<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstalasiRawatInapController extends Controller
{
    public function index()
    {
        $rawatInap = Service::where('type', 'iri')->first();
        $subService = SubService::where('service_id', $rawatInap->id)->get();
        $image = Gallery::where('type', 'iri')->orderBy('sort', 'asc')->get();
        $running_text = RunningText::first();
        return view('user.rawat_inap.index', compact('rawatInap', 'running_text', 'subService', 'image'));
    }
}
