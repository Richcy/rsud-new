<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ArticleCategory::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($row) {
                return $row->created_at->format('d F Y'); // Format tanggal sesuai kebutuhan
            })
            ->addColumn('action', 'admin.category-article.datatables.action')
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.category-article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category-article.create');
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
            $CategoryEvent = new ArticleCategory();
            $CategoryEvent->name = $request->name;
            $CategoryEvent->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.category-article.index')->with('success', 'Kategori Artikel berhasil ditambahkan.');
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
        $categoryArticle = ArticleCategory::findOrFail($id);
        return view('admin.category-article.edit', compact('categoryArticle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $categoryArticle = ArticleCategory::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
            }

            $categoryArticle->name = $request->name;
            $categoryArticle->save();

            DB::commit();

            return redirect()->route('admin.category-article.index')->with('success', 'Kategori Artikel berhasil diupdate.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate kategori artikel: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryArticle = ArticleCategory::where('id', $id)->first();
        try {
            $categoryArticle->delete();

            return response()->json(['success' => true, 'message' => 'Kategori Acara berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
