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

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Article::join('article_categories as ac', 'articles.article_category_id', 'ac.id')
            ->select([
                'articles.*',
                'ac.name',
            ])
            ->whereNot('ac.name', 'cimanews')
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
            ->addColumn('category_article', function($row){
                $categoryArticle = ArticleCategory::where('id', $row->article_category_id)->first();
                return $categoryArticle->name;
            })
            ->editColumn('status', function($row) {
                if ($row->status == 1) {
                   return ' <span class="badge bg-success">Terbitkan</span>';
                } else {
                    return ' <span class="badge bg-danger">Belum Diterbitkan</span>';
                }
            })
            ->editColumn('description', function($row){
                return Str::limit($row->description, 100);
            })
            ->addColumn('action', 'admin.article.datatables.action')
            ->rawColumns(['action', 'status', 'description', 'image'])
            ->make(true);
        }
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryArticle = ArticleCategory::orderBy('name', 'asc')
        ->whereNot('name', 'cimanews')->get();
        return view('admin.article.create', compact('categoryArticle'));
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
            'article_category_id' => 'required|exists:article_categories,id',
            'author' => 'required|string|max:255',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.max' => 'Judul artikel tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'article_category_id.required' => 'Kategori artikel harus dipilih.',
            'article_category_id.exists' => 'Kategori artikel tidak valid.',
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

        DB::beginTransaction();

        try {
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = 'article_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('articles', $filename, 'public');
            }

            // Simpan data ke database
            $article = new Article();
            $article->title = $request->title;
            $article->slug = $request->slug;
            $article->article_category_id = $request->article_category_id;
            $article->author = $request->author;
            $article->status = 1;
            $article->sub_desc = $request->sub_desc;
            $article->description = $request->description;
            $article->img = $path; // Simpan path gambar ke dalam field img
            $article->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil ditambahkan.');
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
        $article = Article::where('slug', $slug)->first();
        $categoryArticle = ArticleCategory::orderBy('name', 'asc')
        ->whereNot('name', 'cimanews')->get();
        return view('admin.article.edit', compact('article', 'categoryArticle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $id,
            'article_category_id' => 'required|exists:article_categories,id',
            'author' => 'required|string|max:255',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel harus diisi.',
            'title.max' => 'Judul artikel tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'article_category_id.required' => 'Kategori artikel harus dipilih.',
            'article_category_id.exists' => 'Kategori artikel tidak valid.',
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

        DB::beginTransaction();

        try {
            $article = Article::findOrFail($id);

            // Jika ada file gambar baru
            if ($request->hasFile('img')) {
                // Hapus gambar lama
                if ($article->img && Storage::disk('public')->exists($article->img)) {
                    Storage::disk('public')->delete($article->img);
                }

                $file = $request->file('img');
                $filename = 'article_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('articles', $filename, 'public');
            } else {
                $path = $article->img;
            }

            // Perbarui data di database
            $article->title = $request->title;
            $article->slug = $request->slug;
            $article->article_category_id = $request->article_category_id;
            $article->author = $request->author;
            $article->status = 1;
            $article->sub_desc = $request->sub_desc;
            $article->description = $request->description;
            $article->img = $path; // Simpan path gambar ke dalam field img
            $article->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil diperbarui.');
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
        $article = Article::where('slug', $slug)->first();
        try {
            $article->delete();

            return response()->json(['success' => true, 'message' => 'Artikel berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
