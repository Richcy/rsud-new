<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CimanewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Article::join('article_categories as ac', 'articles.article_category_id', 'ac.id')
            ->select([
                'articles.*',
                'ac.name',
            ])
            ->where('ac.name', 'cimanews')
            ->orderBy('articles.created_at', 'asc')
            ->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($row) {
                return $row->created_at->format('d F Y'); // Format tanggal sesuai kebutuhan
            })
            ->addColumn('image', function($row) {
                if ($row->img) {
                    return '<img src="' . asset('storage/' . $row->img) . '" height="70px" width="auto">';
                } else {
                    return '-';
                }
            })
            ->editColumn('description', function($row){
                return Str::limit($row->description, 100);
            })
            ->addColumn('action', 'admin.cimanews.datatables.action')
            ->rawColumns(['action', 'description', 'image'])
            ->make(true);
        }
        return view('admin.cimanews.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cimanews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug',
            'author' => 'required|string|max:255',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.max' => 'Judul artikel tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'author.required' => 'Nama penulis harus diisi.',
            'author.max' => 'Nama penulis tidak boleh lebih dari :max karakter.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        $categoryArticle = ArticleCategory::where('name', 'cimanews')
        ->first();

        DB::beginTransaction();

        try {
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = 'cimanews_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('articles', $filename, 'public');
            }

            // Simpan data ke database
            $article = new Article();
            $article->title = $request->title;
            $article->slug = $request->slug;
            $article->article_category_id = $categoryArticle->id;
            $article->author = $request->author;
            $article->status = 1;
            $article->sub_desc = $request->sub_desc;
            $article->description = $request->description;
            $article->img = $path; // Simpan path gambar ke dalam field img
            $article->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.cimanews.index')->with('success', 'Artikel berhasil ditambahkan.');
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
        $cimanews = Article::where('slug', $slug)->first();
        return view('admin.cimanews.edit', compact('cimanews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $cimanews = Article::where('slug', $slug)->first();
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $cimanews->slug . ',slug',
            'author' => 'required|string|max:255',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.max' => 'Judul artikel tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'author.required' => 'Nama penulis harus diisi.',
            'author.max' => 'Nama penulis tidak boleh lebih dari :max karakter.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        $article = Article::where('slug', $slug)->first();
        DB::beginTransaction();

        try {
            // Jika ada file gambar baru
            if ($request->hasFile('img')) {
                // Hapus gambar lama
                if ($article->img && Storage::disk('public')->exists($article->img)) {
                    Storage::disk('public')->delete($article->img);
                }

                $file = $request->file('img');
                $filename = 'cimanews_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('articles', $filename, 'public');
            } else {
                $path = $article->img;
            }
            // Update data artikel
            $article->title = $request->title;
            $article->img = $path;
            $article->slug = $request->slug;
            $article->author = $request->author;
            $article->sub_desc = $request->sub_desc;
            $article->description = $request->description;
            $article->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.cimanews.index')->with('success', 'Artikel berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $cimanews = Article::where('slug', $slug)->first();
        try {
            $cimanews->delete();

            return response()->json(['success' => true, 'message' => 'Cimanews berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
