<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\FeaturedDoctor;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FeaturedDoctorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FeaturedDoctor::with('doctor')->orderBy('sort');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',  'admin.featured-doctor.datatables.action')
                ->addColumn('name', function ($row) {
                    return $row->doctor->name;
                })
                ->addColumn('img', function($row) {
                    if ($row->doctor->img) {
                        return '<img src="' . asset('storage/' . $row->doctor->img) . '" height="70px" width="auto">';
                    } else {
                        return '-';
                    }
                })
                ->rawColumns(['action', 'img'])
                ->make(true);
        }

          // Mengambil semua dokter yang belum menjadi featured doctor
            $doctors = Doctor::whereNotIn('id', FeaturedDoctor::pluck('doctor_id'))->get();

            // Menghitung jumlah featured doctor
            $featuredDoctorCount = FeaturedDoctor::count();

        return view('admin.featured-doctor.index', compact('doctors', 'featuredDoctorCount'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
        ], [
            'doctor_id.required' => 'Doktor Harus Diisi',
            'doctor_id.exists' => 'Doktor Tidak Ditemukan',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                ], 422);
        }

        DB::beginTransaction();

        try {
            // Ambil nilai sort terbesar
            $maxSort = FeaturedDoctor::max('sort');

            $featuredDoctor = new FeaturedDoctor();
            $featuredDoctor->doctor_id = $request->doctor_id;
            $featuredDoctor->sort = $maxSort + 1; // Tambahkan 1 dari nilai sort terbesar
            $featuredDoctor->save();

            DB::commit();

            return response()->json(['success' => 'Dokter Unggulan Berhasil Disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e
            ]);
        }
    }

    public function show($id)
    {

    }

    public function destroy($id)
    {
        try {
            $featuredDoctor = FeaturedDoctor::findOrFail($id);
            $featuredDoctor->delete();

            return response()->json(['success' => 'Featured Doctor deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting featured doctor: ' . $e->getMessage()], 500);
        }
    }
}
