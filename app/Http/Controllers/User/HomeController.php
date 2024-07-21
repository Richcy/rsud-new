<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use App\Models\Article;
use App\Models\Service;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use App\Models\FeaturedDoctor;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort','asc')->get();
        $sambutan = Service::where('type', 'about_company')->first();
        $maklumat = ImageProfile::where('type', 'maklumat_pelayanan')->first();
        $rating = ImageProfile::where('type', 'quality')->first();
        $structure = ImageProfile::where('type', 'structure')->first();
        $doctors = FeaturedDoctor::with('doctor', 'doctor.field_doctor')->orderBy('sort', 'asc')->get();
        $cimanews = Article::whereHas('article_category', function($query) {
            $query->where('name', 'cimanews');
        })->select('articles.*') // ambil kolom yang diperlukan
          ->limit(3)
          ->get();
        return view('user.home.index', compact('sliders', 'sambutan', 'maklumat', 'rating', 'structure', 'doctors', 'cimanews'));
    }
}
