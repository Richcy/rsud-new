<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StructureController extends Controller
{
   public function index()
   {
    $structure = ImageProfile::where('type', 'structure')->first();
    $running_text = RunningText::first();
    return view('user.structure.index', compact('structure', 'running_text'));
   }
}
