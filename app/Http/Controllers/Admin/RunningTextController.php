<?php

namespace App\Http\Controllers\Admin;

use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RunningTextController extends Controller
{
    public function index()
    {
        $data = RunningText::first();
        // return $data;
        return view('admin.running-text.index', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:50'
        ], [
            'content.required' => 'Konten harus diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'content.max' => 'Konten maksimal 50 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Temukan data RunningText berdasarkan ID
            $runningtext = RunningText::findOrFail($id);

            // Update konten
            $runningtext->content = $request->content;
            $runningtext->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Running Text berhasil diubah.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

}
