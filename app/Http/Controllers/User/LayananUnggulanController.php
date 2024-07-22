<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananUnggulanController extends Controller
{
    public function index()
    {
        $unggulan = Service::where('type', 'unggulan')->first();
        $running_text = RunningText::first();
        return view('user.layanan_unggulan.index', compact('unggulan', 'running_text'));
    }
}
