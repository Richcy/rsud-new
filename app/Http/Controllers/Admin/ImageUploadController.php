<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = 'tinymce_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/uploads/tinymce', $imageName);

                $url = url('storage/uploads/tinymce/' . $imageName);
                return response()->json(['location' => $url]);
            }

            return response()->json(['error' => 'No file uploaded'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
