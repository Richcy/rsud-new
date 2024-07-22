<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InstalasiRawatJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::where('type', 'irj')->first();
        return view('admin.rawat-jalan.index', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Gambar harus berformat: jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Mengambil data Service yang type-nya 'irj'
            $service = Service::findOrFail($id);

            // Update deskripsi
            $service->description = $request->input('description');

            // Jika ada gambar yang diunggah
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($service->img) {
                    Storage::delete($service->img);
                }

                // Simpan gambar baru
                $image = $request->file('img');
                $filename = 'irj_' . now()->format('YmdHis') . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('service', $filename, 'public');

                // Update path gambar
                $service->banner = $path;
            }

            // Simpan perubahan
            $service->save();

            DB::commit();

            return redirect()->route('admin.rawat-jalan.index')->with('success', 'Service berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function indexSubService(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = SubService::where('service_id', $id)->get();
            // return $data;
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data) {
                    return view('admin.rawat-jalan.sub-service.datatables.action', compact('data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.rawat-jalan.sub-service.index', compact('id'));
    }

    public function createSubService($id)
    {
        return view('admin.rawat-jalan.sub-service.create', compact('id'));
    }

    public function storeSubService(Request $request, string $id)
    {
       // Validasi data yang diterima
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:sub_services,slug',
        'description' => 'nullable|string',
    ], [
        'title.required' => 'Judul wajib diisi.',
        'title.string' => 'Judul harus berupa teks.',
        'title.max' => 'Judul maksimal 255 karakter.',
        'slug.required' => 'Slug wajib diisi.',
        'slug.string' => 'Slug harus berupa teks.',
        'slug.max' => 'Slug maksimal 255 karakter.',
        'slug.unique' => 'Slug sudah digunakan.',
        'description.string' => 'Deskripsi harus berupa teks.',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Gunakan transaksi database untuk memastikan konsistensi data
    DB::beginTransaction();

    try {
        // Simpan data ke dalam model SubService
        $rawatJalan = new SubService();
        $rawatJalan->title = $request->input('title');
        $rawatJalan->slug = $request->input('slug');
        $rawatJalan->type = 'irj';
        $rawatJalan->service_id = $id;
        $rawatJalan->description = $request->input('description');
        // Tambahkan logika lainnya sesuai kebutuhan

        $rawatJalan->save();

        // Commit transaksi jika semua operasi berhasil
        DB::commit();

        return redirect()->route('admin.rawat-jalan.sub-service.index', $id)->with('success', 'Sub Service berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollback();

        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
    }
    }

    public function editSubService($slug)
    {
        $subService = SubService::where('slug', $slug)->first();
        return view('admin.rawat-jalan.sub-service.edit', compact('subService'));
    }

    public function updateSubService(Request $request, $slug)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'title.required' => 'Nama Subevent wajib diisi.',
            'title.string' => 'Nama Subevent harus berupa teks.',
            'title.max' => 'Nama Subevent tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug wajib diisi.',
            'slug.string' => 'Slug harus berupa teks.',
            'slug.max' => 'Slug tidak boleh lebih dari :max karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $rawatJalan = SubService::where('slug',$slug)->first();

            // Update data
            $rawatJalan->title = $request->input('title');
            $rawatJalan->slug = $request->input('slug');
            $rawatJalan->description = $request->input('description');
            // Handle image upload if needed
            // Save data
            $rawatJalan->save();

            return redirect()->route('admin.rawat-jalan.sub-service.index', $rawatJalan->service_id)->with('success', 'Sub Service berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui Sub Service: ' . $e->getMessage());
        }
    }

    public function destroySubService($slug)
    {
        DB::beginTransaction();

        try {
            $rawatJalan = SubService::where('slug', $slug);

            // Hapus data dari database
            $rawatJalan->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Sub Service Berhasil Dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    public function galleryIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::where('type', 'irj')->orderBy('created_at', 'asc')->get();

            return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('action', 'admin.rawat-jalan.gallery.datatables.action')
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


         $id = Service::where('type', 'irj')->select('id')->first();
         return view('admin.rawat-jalan.gallery.index', compact('id'));
    }

    public function galleryCreate()
    {
        return view('admin.rawat-jalan.gallery.create');
    }

    public function galleryStore(Request $request)
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
                $filename = 'irj_' . now()->format('YmdHis') . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('gallery', $filename, 'public');

                // Mengambil nilai sort terbesar + 1, atau 1 jika tidak ada
                $maxSort = Gallery::where('type', 'irj')->max('sort');
                $sort = $maxSort ? $maxSort + 1 : 1;

                $gallery = new Gallery();
                $gallery->img = $path;
                $gallery->type = 'irj';
                $gallery->sort = $sort;
                $gallery->save();

                DB::commit();

                return redirect()->route('admin.rawat-jalan.gallery.index')->with('success', 'Gambar berhasil diunggah');
            }

            return redirect()->back()->with('error', 'Gagal mengunggah gambar');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function galleryEdit($id)
    {
        $data = Gallery::find($id);
        return view('admin.rawat-jalan.gallery.edit', compact('data'));
    }

    public function galleryUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Gambar harus berformat: jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $gallery = Gallery::findOrFail($id);

            if ($request->hasFile('img')) {
                // Hapus gambar lama
                if ($gallery->img && Storage::disk('public')->exists($gallery->img)) {
                    Storage::disk('public')->delete($gallery->img);
                }

                // Simpan gambar baru
                $image = $request->file('img');
                $filename = 'irj_' . now()->format('YmdHis') . '_' . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('gallery', $filename, 'public');
                $gallery->img = $path;
            }

            // Update data lainnya jika diperlukan
            $gallery->save();

            DB::commit();

            return redirect()->route('admin.rawat-jalan.gallery.index')->with('success', 'Gambar berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function galleryDestroy($id)
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
}
