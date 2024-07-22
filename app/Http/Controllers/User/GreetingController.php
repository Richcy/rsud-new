<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GreetingController extends Controller
{
    public function index()
    {
        $greeting = Service::where('type', 'about_home')->first();
        $running_text = RunningText::first();
        return view('user.greeting.index', compact('greeting', 'running_text'));
    }
}
