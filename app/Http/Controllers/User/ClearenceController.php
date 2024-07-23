<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SubService;
use Illuminate\Http\Request;

class ClearenceController extends Controller
{
    public function editBaseUrlDescription(){
        try {
            $subServices = SubService::get();
            
            foreach ($subServices as $key => $value) {
                $description = str_replace('https://rsudcimacan.cianjurkab.go.id', env('APP_URL'), $value->description);

                $value->update([
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
