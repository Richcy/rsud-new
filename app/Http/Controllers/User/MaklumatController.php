<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaklumatController extends Controller
{
    public function index()
    {
        $maklumat_pelayanan = ImageProfile::where('type', 'maklumat_pelayanan')->first();
        $running_text = RunningText::first();
        return view('user.maklumat_pelayanan.index', compact('maklumat_pelayanan', 'running_text'));
    }
}
