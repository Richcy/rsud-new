<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Career;
use App\Models\Event;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class ClearenceController extends Controller
{
    public function editBaseUrlDescription(){
        try {
            $subServices = SubService::get();
            $services = Service::get();
            $events = Event::get();
            $articles = Article::get();
            $careers = Career::get();
            
            foreach ($subServices as $key => $value) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $value->description);

                $value->update([
                    'description' => $description
                ]);
            }

            foreach ($services as $key => $service) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $service->description);

                $service->update([
                    'description' => $description
                ]);
            }

            foreach ($events as $key => $event) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $event->description);

                $event->update([
                    'description' => $description
                ]);
            }

            foreach ($articles as $key => $article) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $article->description);

                $article->update([
                    'description' => $description
                ]);
            }

            foreach ($careers as $key => $career) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $career->description);

                $career->update([
                    'description' => $description
                ]);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Berhasil'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
