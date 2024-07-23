<?php

namespace App\Http\Controllers\User;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaboratoriumController extends Controller
{
    public function index()
    {
     $lab = Service::where('type', 'lab')->first();
     $subService = SubService::where('service_id', $lab->id)->get();
     $image = Gallery::where('type', 'lab')->orderBy('sort', 'asc')->get();
     $running_text = RunningText::first();
     return view('user.laboratorium.index', compact('lab', 'running_text', 'subService', 'image'));
    }
}
