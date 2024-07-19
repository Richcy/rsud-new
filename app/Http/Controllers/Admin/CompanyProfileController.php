<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\ImageProfile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyProfileController extends Controller
{
    public function profile()
    {
        $data = Service::where('type', 'about_company')->first();
        return view('admin.company-profile.profile', compact('data'));
    }
    public function profileUpdate($id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'description.required' => 'Deskripsi harus diisi.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $greeting = Service::findOrFail($id);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = 'profile_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');
            } else {
                $path = $greeting->banner;
            }
            // Simpan path gambar ke dalam database
            $greeting->update([
                'banner' => $path,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function profileGallery(Request $request)
    {
        if ($request->ajax()) {
           $data = Gallery::where('type', 'about_company')->orderBy('created_at', 'asc')->get();

           return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'admin.company-profile.profile-gallery.datatables.action')
            ->editColumn('img', function($row) {
                if ($row->img) {
                    return '<img src="' . asset('storage/' . $row->img) . '" height="70px" width="auto">';
                } else {
                    return '-';
                }
            })
            ->rawColumns(['action', 'img'])
            ->make(true);
        }
        return view('admin.company-profile.profile-gallery.index');
    }

    public function profileGalleryCreate()
    {
        return view('admin.company-profile.profile-gallery.create');
    }

    public function ProfileGalleryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img.required' => 'Gambar wajib diunggah.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Gambar harus berformat: jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $filename = 'gallery_' . now()->format('YmdHis') . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('gallery', $filename, 'public');

                // Mengambil nilai sort terbesar + 1, atau 1 jika tidak ada
                $maxSort = Gallery::where('type', 'about_company')->max('sort');
                $sort = $maxSort ? $maxSort + 1 : 1;

                $gallery = new Gallery();
                $gallery->img = $path;
                $gallery->type = 'about_company';
                $gallery->sort = $sort;
                $gallery->save();

                DB::commit();

                return redirect()->route('admin.profileGallery.index')->with('success', 'Gambar berhasil diunggah');
            }

            return redirect()->back()->with('error', 'Gagal mengunggah gambar');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function profileGallerydestroy(string $id)
    {
        DB::beginTransaction();

        try {
            $gallery = Gallery::findOrFail($id);

            // Hapus file gambar dari storage
            if (Storage::exists($gallery->img)) {
                Storage::delete($gallery->img);
            }

            // Hapus data dari database
            $gallery->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Gambar Berhasil Dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function greeting(Request $request)
    {
        $data = Service::where('type', 'about_home')->first();
        return view('admin.company-profile.greeting', compact('data'));
    }
    public function greetingUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'description.required' => 'Deskripsi harus diisi.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $greeting = Service::findOrFail($id);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = 'greeting_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');
            } else {
                $path = $greeting->banner;
            }
            // Simpan path gambar ke dalam database
            $greeting->update([
                'banner' => $path,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
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
    public function qualityCheck()
    {
        $data = ImageProfile::where('type', 'quality')->first();
        return view('admin.company-profile.quality_check', compact('data'));
    }

    public function qualityCheckUpdate(Request $request, $id)
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
                $imageName = 'quality_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'quality',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function pelayanan()
    {
        $data = ImageProfile::where('type', 'maklumat_pelayanan')->first();
        return view('admin.company-profile.pelayanan', compact('data'));
    }

    public function pelayananUpdate(Request $request, $id)
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
                $imageName = 'pelayanan_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'maklumat_pelayanan',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function standarPelayanan()
    {
        $data = ImageProfile::where('type', 'standard_pelayanan')->first();
        return view('admin.company-profile.standard_pelayanan', compact('data'));
    }

    public function standarPelayananUpdate(Request $request, $id)
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
                $imageName = 'standard_pelayanan_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'standard_pelayanan',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Gambar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function hak()
    {
        $data = ImageProfile::where('type', 'hak_kewajiban')->first();
        return view('admin.company-profile.hak_kewajiban', compact('data'));
    }

    public function hakUpdate(Request $request, $id)
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
                $imageName = 'hak-kewajiban_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('about_company', $imageName, 'public');

                // Simpan path gambar ke dalam database
                $structure->update([
                    'img' => $path,
                    'type' => 'hak_kewajiban',
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
