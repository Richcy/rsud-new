<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admin = Admin::orderBy('username', 'asc')->get();

            return DataTables::of($admin)
                ->addIndexColumn()
                ->addColumn('action', 'admin.admin.datatables.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:admins',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus format yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Cari role_id untuk super-admin
            $superAdminRole = Role::where('name', 'super_admin')->firstOrFail();

            // Buat admin baru
            $admin = new Admin();
            $admin->username = $request->username;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->role_id = $superAdminRole->id;
            $admin->save();

            DB::commit();

            return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
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
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:admins,username,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus format yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', $validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            // Cari admin yang akan diupdate
            $admin = Admin::findOrFail($id);

            // Update data admin
            $admin->username = $request->username;
            $admin->name = $request->name;
            $admin->email = $request->email;
            if ($request->filled('password')) {
                $admin->password = Hash::make($request->password);
            }

            $admin->save();

            DB::commit();

            return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            // Hitung total admin
            $totalAdmins = Admin::count();

            // Jika total admin kurang dari atau sama dengan 1, tolak penghapusan
            if ($totalAdmins <= 1) {
                return response()->json(['success' => false, 'message' => 'Tidak dapat menghapus admin terakhir.']);
                // return redirect()->route('admin.admin.index')->with('error', 'Tidak dapat menghapus admin terakhir.');
            }

            // Cari admin yang akan dihapus
            $admin = Admin::findOrFail($id);

            // Hapus admin
            $admin->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Admin Berhasil Dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            // return redirect()->route('admin.admin.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
