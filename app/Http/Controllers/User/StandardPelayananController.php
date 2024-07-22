<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StandardPelayananController extends Controller
{
    public function index()
    {   $standard_pelayanan = ImageProfile::where('type', 'standard_pelayanan')->first();
        $running_text = RunningText::first();
        return view('user.standard_pelayanan.index', compact('running_text', 'standard_pelayanan'));
    }
}
