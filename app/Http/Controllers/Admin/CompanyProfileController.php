<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyProfileController extends Controller
{
    public function structure()
    {
        $data = ImageProfile::where('type', 'structure')->first();
        return view('admin.company-profile.structure', compact('data'));
    }

    public function structureUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $structure = ImageProfile::findOrFail($id);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = 'structure_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'structure',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function sketch()
    {
        $data = ImageProfile::where('type', 'sketch')->first();
        return view('admin.company-profile.sketch', compact('data'));
    }

    public function sketchUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $structure = ImageProfile::findOrFail($id);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = 'sketch_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'sketch',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

}
