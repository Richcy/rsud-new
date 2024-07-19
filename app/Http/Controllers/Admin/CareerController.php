<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $careers = Career::orderBy('created_at', 'asc')->get();

            return DataTables::of($careers)
                ->addIndexColumn()
                ->addColumn('img', function($row) {
                    if ($row->image) {
                        return '<img src="' . asset('storage/' . $row->image) . '" height="70px" width="auto">';
                    } else {
                        return '-';
                    }
                })
                ->editColumn('status', function($row) {
                    if ($row->status == 1) {
                       return ' <span class="badge bg-success">Terbitkan</span>';
                    } else {
                        return ' <span class="badge bg-danger">Belum Diterbitkan</span>';
                    }
                })
                ->editColumn('created_at', function($row) {
                    return $row->created_at->format('d F Y'); // Format tanggal
                })
                ->editColumn('description', function($row) {
                    return strlen($row->description) > 20 ? substr($row->description, 0, 25) . '...' : $row->description; // Batasi panjang description
                })
                ->addColumn('action', 'admin.career.datatables.action')
                ->rawColumns(['img', 'action', 'status', 'description'])
                ->make(true);
        }

        return view('admin.career.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:careers,slug',
            'url' => 'required|url',
            'status' => 'required|in:1,0',
            'sub_desc' => 'nullable|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'title.required' => 'Judul harus diisi.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'url.required' => 'URL harus diisi.',
            'url.url' => 'URL tidak valid.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status harus berisi 1 atau 0.',
            'img.required' => 'Foto harus diunggah.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
            'description.required' => 'Deskripsi harus Diisi',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Handle file upload
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = 'career_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('career', $filename, 'public');
            }

            // Simpan data ke database
            $career = new Career();
            $career->title = $request->title;
            $career->slug = $request->slug;
            $career->url = $request->url;
            $career->status = $request->status;
            $career->sub_desc = $request->sub_desc;
            $career->description = $request->description;
            $career->image = $path; // Simpan path gambar ke dalam field img
            $career->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.career.index')->with('success', 'Career berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $career = Career::where('slug', $slug)->first();
        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:careers,slug,' . $id,
            'url' => 'required|url',
            'status' => 'required|in:1,0',
            'sub_desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ], [
            'title.required' => 'Judul harus diisi.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'url.required' => 'URL harus diisi.',
            'url.url' => 'URL tidak valid.',
            'status.required' => 'Status harus dipilih.',
            'status.in' => 'Status harus berisi 1 atau 0.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
            'description.required' => 'Deskripsi harus diisi.'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Temukan data karir yang akan diupdate
            $career = Career::findOrFail($id);

            // Hapus foto lama jika ada foto baru diunggah
            if ($request->hasFile('img')) {
                Storage::disk('public')->delete($career->image); // Hapus foto lama dari penyimpanan
                $file = $request->file('img');
                $filename = 'career_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('career', $filename, 'public');
                $career->image = $path; // Simpan path gambar baru ke dalam field img
            }

            // Update data karir
        $career->title = $request->title;
        $career->slug = $request->slug;
        $career->url = $request->url;
        $career->status = $request->status;
        $career->sub_desc = $request->sub_desc;
        $career->description = $request->description;
        $career->save();

        DB::commit();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.career.index')->with('success', 'Career berhasil diperbarui.');
    } catch (\Exception $e) {
        DB::rollBack();

        // Redirect dengan pesan error
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $career = Career::find($request->career_id);

        if (!$career) {
            return response()->json(['success' => false, 'message' => 'Karir tidak ditemukan.']);
        }

        $career->status = $request->status;
        $career->save();

        return response()->json(['success' => true, 'message' => 'Status karir berhasil diubah.']);
    }
}
