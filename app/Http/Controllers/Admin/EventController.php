<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::with('event_category')->orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('event_category', function($row){
                return $row->event_category->name;
            })
            ->editColumn('description', function($row){
                return Str::limit($row->description, 100);
            })
            ->editColumn('url', function($row) {
                return '<a href="'. $row->url .'" target="_blank" class="btn btn-sm btn-info">Lihat</a>';
            })
            ->editColumn('created_at', function($row){
                return Carbon::parse($row->created_at)->format('d-m-Y');
            })
            ->editColumn('start_date', function($row){
                return Carbon::parse($row->start_date)->translatedFormat('d-m-Y');
            })
            ->editColumn('end_date', function($row){
                return Carbon::parse($row->end_date)->translatedFormat('d-m-Y');
            })
            ->addColumn('action', 'admin.event.datatables.action')
            ->rawColumns(['action', 'url', 'description'])
            ->make(true);
        }
        return view('admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryEvent = EventCategory::orderBy('name', 'asc')->get();
        return view('admin.event.create', compact('categoryEvent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug',
            'event_category_id' => 'required|exists:event_categories,id',
            'url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'nullable|string',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul event harus diisi.',
            'title.max' => 'Judul event tidak boleh lebih dari :max karakter.',
            'slug.required' => 'Slug harus diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'event_category_id.required' => 'Kategori acara harus dipilih.',
            'event_category_id.exists' => 'Kategori acara tidak valid.',
            'url.url' => 'URL tidak valid.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'end_date.required' => 'Tanggal selesai harus diisi.',
            'end_date.date' => 'Format tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'start_time.date_format' => 'Format jam mulai tidak valid.',
            'end_time.date_format' => 'Format jam selesai tidak valid.',
            'end_time.after' => 'Jam selesai harus setelah jam mulai.',
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


            // Simpan data ke database
            $event = new Event();
            $event->title = $request->title;
            $event->slug = $request->slug;
            $event->event_category_id = $request->event_category_id;
            $event->url = $request->url;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->location = $request->location;
            $event->sub_desc = $request->sub_desc;
            $event->description = $request->description;


            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = 'event_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('events', $filename, 'public');
            }
            $event->img = $path;  // Simpan path gambar ke dalam field img
            $event->save();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan.');
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
        $event = Event::where('slug', $slug)->first();
        $categoryEvent = EventCategory::orderBy('name', 'asc')->get();
        return view('admin.event.edit', compact('event', 'categoryEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->first();
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:events,slug,' . $event->slug . ',slug',
            'event_category_id' => 'required|exists:event_categories,id',
            'url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'location' => 'nullable|string',
            'sub_desc' => 'nullable|string',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Judul event harus diisi.',
            'title.max' => 'Judul event tidak boleh lebih dari :max karakter.',
            'event_category_id.required' => 'Kategori acara harus dipilih.',
            'event_category_id.exists' => 'Kategori acara tidak valid.',
            'url.url' => 'URL tidak valid.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'end_date.required' => 'Tanggal selesai harus diisi.',
            'end_date.date' => 'Format tanggal selesai tidak valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'start_time.date_format' => 'Format jam mulai tidak valid.',
            'end_time.date_format' => 'Format jam selesai tidak valid.',
            'end_time.after' => 'Jam selesai harus setelah jam mulai.',
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
            // Cari event berdasarkan slug
            $event = Event::where('slug', $slug)->firstOrFail();

            // Jika ada file gambar baru diupload, hapus gambar yang lama
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($event->img && Storage::disk('public')->exists($event->img)) {
                    Storage::disk('public')->delete($event->img);
                }

                // Upload gambar baru
                $file = $request->file('img');
                $filename = 'event_' . Carbon::now()->format('Ymd_His') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('events', $filename, 'public');

                // Simpan path gambar ke dalam field img
                $event->img = $path;
            }

            // Update data event
            $event->title = $request->title;
            $event->event_category_id = $request->event_category_id;
            $event->url = $request->url;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->location = $request->location;
            $event->sub_desc = $request->sub_desc;
            $event->description = $request->description;
            $event->update();

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui.');
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
        $event = Event::where('id', $id)->first();
        try {
            $event->delete();

            return response()->json(['success' => true, 'message' => 'Acara berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
