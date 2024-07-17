<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EventCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EventCategory::select(['id', 'name', 'created_at', 'updated_at']); // Sesuaikan dengan field yang dibutuhkan
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function($row) {
                    return $row->created_at->format('d F Y'); // Format tanggal sesuai kebutuhan
                })
                ->addColumn('action', 'admin.category-event.datatables.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category-event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',

        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.string' => 'Nama kategori harus berupa text',
            'name.max' => 'Nama kategori maksimal 100 karakter',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Simpan data ke database
            $CategoryEvent = new EventCategory();
            $CategoryEvent->name = $request->name;
            $CategoryEvent->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.category-event.index')->with('success', 'Kategori Acara berhasil ditambahkan.');
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
    public function edit($id)
    {
        $categoryEvent = EventCategory::findOrFail($id);
        return view('admin.category-event.edit', compact('categoryEvent'));
    }


    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         $categoryEvent = EventCategory::findOrFail($id);

         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
         ]);

         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
         }

         $categoryEvent->name = $request->name;
         $categoryEvent->save();

         return redirect()->route('admin.category-event.index')->with('success', 'Kategori Acara berhasil diupdate.');
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryEvent = EventCategory::where('id', $id)->first();
        try {
            $categoryEvent->delete();

            return response()->json(['success' => true, 'message' => 'Kategori Acara berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
