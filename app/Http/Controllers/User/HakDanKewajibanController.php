<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HakDanKewajibanController extends Controller
{
    public function index()
    {
        $hak_kewajiban = ImageProfile::where('type', 'hak_kewajiban')->first();
        $running_text = RunningText::first();
        return view('user.hak_kewajiban.index', compact('hak_kewajiban', 'running_text'));
    }
}
