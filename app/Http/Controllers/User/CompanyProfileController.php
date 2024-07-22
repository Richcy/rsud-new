<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $profile = Service::where('type', 'about_company')->first();
        $running_text = RunningText::first();
        return view('user.company_profile.index', compact('running_text', 'profile'));
    }
}
