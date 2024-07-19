<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function($row) {
                    return '<img src="' . asset('storage/' . $row->img) . '" height="70px" width="auto">';
                })
                ->addColumn('action', 'admin.sliders.datatables.action')
                ->rawColumns(['img', 'action'])
                ->make(true);
        }
        return view('admin.sliders.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sliders,slug',
            'description' => 'nullable|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul harus diisi.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'img.required' => 'Foto harus diunggah.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Foto harus berupa file dengan format: jpeg, png, jpg, gif.',
            'img.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Handle file upload
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = 'slider_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sliders', $filename, 'public');
            }

            // Determine the sort order
            $last_slider = Slider::orderBy('sort', 'desc')->first();
            $sort_order = ($last_slider) ? $last_slider->sort + 1 : 1;

            // Simpan data ke database
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->slug = $request->slug;
            $slider->description = $request->description;
            $slider->img = $path;
            $slider->sort = $sort_order; // Assign the sort order
            $slider->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil ditambahkan.');
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
        $slider = Slider::where('slug', $slug)->first();
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sliders', 'slug')->ignore($slug, 'slug')
            ],
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul harus diisi.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'img.image' => 'Foto harus berupa gambar.',
            'img.mimes' => 'Foto harus berupa file dengan format: jpeg, png, jpg, gif.',
            'img.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Find the slider by slug
            $slider = Slider::where('slug', $slug)->firstOrFail();

            // Handle file upload if new image is uploaded
            if ($request->hasFile('img')) {
                // Delete old image if it exists
                if ($slider->img && Storage::disk('public')->exists($slider->img)) {
                    Storage::disk('public')->delete($slider->img);
                }

                // Upload new image
                $file = $request->file('img');
                $filename = 'slider_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sliders', $filename, 'public');

                // Update the img field
                $slider->img = $path;
            }

            // Update other fields
            $slider->title = $request->title;
            $slider->slug = $request->slug;
            $slider->description = $request->description;
            $slider->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil diperbarui.');
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
        $slider = Slider::where('slug', $slug)->first();
        try {
            $slider->delete();

            return response()->json(['success' => true, 'message' => 'Template Lagu berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
