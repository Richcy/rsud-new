<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokumenPelayananPublikController extends Controller
{
    public function index()
    {
        $dokumen_pelayanan_publik = ImageProfile::where('type', 'dokumen_pelayanan_publik')->first();
        $running_text = RunningText::first();
        return view('user.dokumen_pelayanan_publik.index', compact('running_text', 'dokumen_pelayanan_publik'));
    }
}
