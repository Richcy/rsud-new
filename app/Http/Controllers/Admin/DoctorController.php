<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\FieldDoctor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Doctor::orderBy('created_at', 'asc')->with('field_doctor')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.doctor.datatables.action')
                ->editColumn('img', function($row) {
                    if ($row->img) {
                        return '<img src="' . asset('storage/' . $row->img) . '" height="70px" width="auto">';
                    } else {
                        return '-';
                    }
                })
                ->editColumn('field_id', function($row){
                    return $row->field_doctor->name;
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }
        return view('admin.doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $field = FieldDoctor::orderBy('name', 'asc')->get();
        return view('admin.doctor.create', compact('field'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'field_id' => 'required|integer|exists:field_doctors,id',
            'office' => 'required|string|max:255',
            'sip' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'field_id.required' => 'Bidang harus diisi.',
            'field_id.integer' => 'Bidang tidak valid.',
            'field_id.exists' => 'Bidang tidak ditemukan.',
            'office.required' => 'Jabatan harus diisi.',
            'office.max' => 'Jabatan tidak boleh lebih dari :max karakter.',
            'sip.required' => 'SIP harus diisi.',
            'sip.max' => 'SIP tidak boleh lebih dari :max karakter.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Jika ada file gambar yang diupload
            if ($request->hasFile('img')) {
                // Upload gambar baru
                $file = $request->file('img');
                $filename = 'doctor_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('doctors', $filename, 'public');
            }

            // Simpan data ke database
            $doctor = new Doctor();
            $doctor->name = $request->name;
            $doctor->field_id = $request->field_id;
            $doctor->office = $request->office;
            $doctor->sip = $request->sip;
            $doctor->img = $path ?? null; // Simpan path gambar ke dalam field img
            $doctor->lang = 'id';
            $doctor->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.doctor.index')->with('success', 'Dokter berhasil ditambahkan.');
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
        $doctor = Doctor::find($id);
        $field = FieldDoctor::orderBy('name', 'asc')->get();
        return view('admin.doctor.edit', compact('doctor', 'field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'field_id' => 'required|integer|exists:field_doctors,id',
        'office' => 'required|string|max:255',
        'sip' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'name.required' => 'Nama harus diisi.',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
        'field_id.required' => 'Bidang harus diisi.',
        'field_id.integer' => 'Bidang tidak valid.',
        'field_id.exists' => 'Bidang tidak ditemukan.',
        'office.required' => 'Jabatan harus diisi.',
        'office.max' => 'Jabatan tidak boleh lebih dari :max karakter.',
        'sip.required' => 'SIP harus diisi.',
        'sip.max' => 'SIP tidak boleh lebih dari :max karakter.',
        'img.image' => 'File harus berupa gambar.',
        'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
    }

    DB::beginTransaction();

    try {
        $doctor = Doctor::findOrFail($id);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($doctor->img) {
                Storage::disk('public')->delete($doctor->img);
            }

            // Upload gambar baru
            $file = $request->file('img');
            $filename = 'doctor_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('doctors', $filename, 'public');
            $doctor->img = $path;
        }

        // Update data ke database
        $doctor->name = $request->name;
        $doctor->field_id = $request->field_id;
        $doctor->office = $request->office;
        $doctor->sip = $request->sip;
        $doctor->lang = 'id';
        $doctor->save();

        DB::commit();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.doctor.index')->with('success', 'Dokter berhasil diupdate.');
    } catch (\Exception $e) {
        DB::rollBack();

        // Redirect dengan pesan error
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        try {
            $doctor->delete();

            return response()->json(['success' => true, 'message' => 'Dokter berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
