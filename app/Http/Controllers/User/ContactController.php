<?php

namespace App\Http\Controllers\User;

use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $running_text = RunningText::first();
        return view('user.contact.index', compact('running_text'));
    }
}
