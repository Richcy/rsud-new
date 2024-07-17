<?php

namespace App\Http\Controllers;

use App\Models\FieldDoctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FieldDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {
        $data = FieldDoctor::orderBy('created_at', 'asc')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('created_at', function($row) {
            return $row->created_at->format('d F Y'); // Format tanggal sesuai kebutuhan
        })
        ->addColumn('action', 'admin.field-doctor.datatables.action')
        ->rawColumns(['action'])
        ->make(true);
       }
      return view('admin.field-doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.field-doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'lang' => 'required|string|max:50',

        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.string' => 'Nama kategori harus berupa text',
            'name.max' => 'Nama kategori maksimal 100 karakter',
            'lang.required' => 'Bahasa harus diisi',
            'lang.string' => 'Bahasa harus berupa text',
            'lang.max' => 'Bahasa maksimal 50 karakter',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Simpan data ke database
            $fieldDoctor = new FieldDoctor();
            $fieldDoctor->name = $request->name;
            $fieldDoctor->lang = $request->lang;
            $fieldDoctor->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.field-doctor.index')->with('success', 'Bidang Dokter berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $fieldDoctor = FieldDoctor::findOrFail($id);
        return view('admin.field-doctor.edit', compact('fieldDoctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'lang' => 'required|string|max:50',

        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.string' => 'Nama kategori harus berupa teks',
            'name.max' => 'Nama kategori maksimal 100 karakter',
            'lang.required' => 'Bahasa harus diisi',
            'lang.string' => 'Bahasa harus berupa teks',
            'lang.max' => 'Bahasa maksimal 50 karakter',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Temukan bidang dokter berdasarkan ID
            $fieldDoctor = FieldDoctor::findOrFail($id);

            // Update data bidang dokter
            $fieldDoctor->name = $request->name;
            $fieldDoctor->lang = $request->lang;
            $fieldDoctor->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.field-doctor.index')->with('success', 'Bidang Dokter berhasil diperbarui.');
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
        $fieldDoctor = FieldDoctor::where('id', $id)->first();
        try {
            $fieldDoctor->delete();

            return response()->json(['success' => true, 'message' => 'Bidang Dokter berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
