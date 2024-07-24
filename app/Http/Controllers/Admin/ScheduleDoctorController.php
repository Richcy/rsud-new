<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ScheduleDoctor;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ScheduleDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ScheduleDoctor::with('doctor')->orderBy('created_at', 'asc')->get(); // Assuming you have a ScheduleDoctor model with a relation to Doctor
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('doctor_name', function($row){
                    return $row->doctor->name;
                })
                ->addColumn('monday', function($row){
                    return $row->monday;
                })
                ->addColumn('tuesday', function($row){
                    return $row->tuesday;
                })
                ->addColumn('wednesday', function($row){
                    return $row->wednesday;
                })
                ->addColumn('thursday', function($row){
                    return $row->thursday;
                })
                ->addColumn('friday', function($row){
                    return $row->friday;
                })
                ->addColumn('saturday', function($row){
                    return $row->saturday;
                })
                ->addColumn('sunday', function($row){
                    return $row->sunday;
                })
                ->addColumn('action', 'admin.schedule-doctor.datatables.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.schedule-doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::whereDoesntHave('schedule_doctor')->get();
        return view('admin.schedule-doctor.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'senin-start-time' => 'nullable|date_format:H:i',
            'senin-end-time' => 'nullable|date_format:H:i|after:senin-start-time',
            'selasa-start-time' => 'nullable|date_format:H:i',
            'selasa-end-time' => 'nullable|date_format:H:i|after:selasa-start-time',
            'rabu-start-time' => 'nullable|date_format:H:i',
            'rabu-end-time' => 'nullable|date_format:H:i|after:rabu-start-time',
            'kamis-start-time' => 'nullable|date_format:H:i',
            'kamis-end-time' => 'nullable|date_format:H:i|after:kamis-start-time',
            'jumat-start-time' => 'nullable|date_format:H:i',
            'jumat-end-time' => 'nullable|date_format:H:i|after:jumat-start-time',
            'sabtu-start-time' => 'nullable|date_format:H:i',
            'sabtu-end-time' => 'nullable|date_format:H:i|after:sabtu-start-time',
            'minggu-start-time' => 'nullable|date_format:H:i',
            'minggu-end-time' => 'nullable|date_format:H:i|after:minggu-start-time',
        ], [
            'doctor_id.required' => 'Dokter harus dipilih.',
            'doctor_id.exists' => 'Dokter tidak ditemukan.',
            'senin-end-time.after' => 'Jam selesai Senin harus setelah jam mulai.',
            'selasa-end-time.after' => 'Jam selesai Selasa harus setelah jam mulai.',
            'rabu-end-time.after' => 'Jam selesai Rabu harus setelah jam mulai.',
            'kamis-end-time.after' => 'Jam selesai Kamis harus setelah jam mulai.',
            'jumat-end-time.after' => 'Jam selesai Jumat harus setelah jam mulai.',
            'sabtu-end-time.after' => 'Jam selesai Sabtu harus setelah jam mulai.',
            'minggu-end-time.after' => 'Jam selesai Minggu harus setelah jam mulai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', $validator->errors()->first());
        }

        try {
            $scheduleData = [];

            // Buat array untuk setiap hari dan validasi start-time dan end-time
            $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
            foreach ($days as $day) {
                $startTime = $request->input("{$day}-start-time");
                $endTime = $request->input("{$day}-end-time");

                if ($startTime && $endTime) {
                    $scheduleData[$day] = "{$startTime} - {$endTime}";
                }
            }

            // Simpan data ke database
            $scheduleDoctor = new ScheduleDoctor();
            $scheduleDoctor->doctor_id = $request->doctor_id;
            $scheduleDoctor->senin = Arr::get($scheduleData, 'senin', null);
            $scheduleDoctor->selasa = Arr::get($scheduleData, 'selasa', null);
            $scheduleDoctor->rabu = Arr::get($scheduleData, 'rabu', null);
            $scheduleDoctor->kamis = Arr::get($scheduleData, 'kamis', null);
            $scheduleDoctor->jumat = Arr::get($scheduleData, 'jumat', null);
            $scheduleDoctor->sabtu = Arr::get($scheduleData, 'sabtu', null);
            $scheduleDoctor->minggu = Arr::get($scheduleData, 'minggu', null);
            $scheduleDoctor->save();

            return redirect()->route('admin.schedule-doctor.index')->with('success', 'Jadwal dokter berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data jadwal dokter: ' . $e->getMessage());
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
        $doctors = Doctor::whereNotIn('id', function ($query) use ($id) {
            $query->select('doctor_id')
                  ->from('schedule_doctors')
                  ->where('id', '!=', $id); // Exclude the current schedule doctor
        })
        ->get();
        try {
            $scheduleDoctor = ScheduleDoctor::findOrFail($id);

            // Ubah format string jadwal ke format start-time dan end-time
            $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
            foreach ($days as $day) {
                if ($scheduleDoctor->$day) {
                    [$startTime, $endTime] = explode(' - ', $scheduleDoctor->$day);
                    $scheduleDoctor->{"{$day}-start-time"} = $startTime;
                    $scheduleDoctor->{"{$day}-end-time"} = $endTime;
                } else {
                    $scheduleDoctor->{"{$day}-start-time"} = null;
                    $scheduleDoctor->{"{$day}-end-time"} = null;
                }
            }

            return view('admin.schedule-doctor.edit', compact('scheduleDoctor', 'doctors'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'senin-start-time' => 'nullable|date_format:H:i',
            'senin-end-time' => 'nullable|date_format:H:i|after:senin-start-time',
            'selasa-start-time' => 'nullable|date_format:H:i',
            'selasa-end-time' => 'nullable|date_format:H:i|after:selasa-start-time',
            'rabu-start-time' => 'nullable|date_format:H:i',
            'rabu-end-time' => 'nullable|date_format:H:i|after:rabu-start-time',
            'kamis-start-time' => 'nullable|date_format:H:i',
            'kamis-end-time' => 'nullable|date_format:H:i|after:kamis-start-time',
            'jumat-start-time' => 'nullable|date_format:H:i',
            'jumat-end-time' => 'nullable|date_format:H:i|after:jumat-start-time',
            'sabtu-start-time' => 'nullable|date_format:H:i',
            'sabtu-end-time' => 'nullable|date_format:H:i|after:sabtu-start-time',
            'minggu-start-time' => 'nullable|date_format:H:i',
            'minggu-end-time' => 'nullable|date_format:H:i|after:minggu-start-time',
        ], [
            'doctor_id.required' => 'Dokter harus dipilih.',
            'doctor_id.exists' => 'Dokter tidak ditemukan.',
            'senin-end-time.after' => 'Jam selesai Senin harus setelah jam mulai.',
            'selasa-end-time.after' => 'Jam selesai Selasa harus setelah jam mulai.',
            'rabu-end-time.after' => 'Jam selesai Rabu harus setelah jam mulai.',
            'kamis-end-time.after' => 'Jam selesai Kamis harus setelah jam mulai.',
            'jumat-end-time.after' => 'Jam selesai Jumat harus setelah jam mulai.',
            'sabtu-end-time.after' => 'Jam selesai Sabtu harus setelah jam mulai.',
            'minggu-end-time.after' => 'Jam selesai Minggu harus setelah jam mulai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', $validator->errors()->first());
        }

        try {
            $scheduleDoctor = ScheduleDoctor::findOrFail($id);

            // Update data jadwal dokter
            $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
            foreach ($days as $day) {
                $startTime = $request->input("{$day}-start-time");
                $endTime = $request->input("{$day}-end-time");

                if ($startTime && $endTime) {
                    $scheduleDoctor->$day = "{$startTime} - {$endTime}";
                } else {
                    $scheduleDoctor->$day = null;
                }
            }

            $scheduleDoctor->doctor_id = $request->doctor_id;
            $scheduleDoctor->save();

            return redirect()->route('admin.schedule-doctor.index')->with('success', 'Jadwal dokter berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data jadwal dokter: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scheduleData = ScheduleDoctor::where('id', $id)->first();
        try {
            $scheduleData->delete();

            return response()->json(['success' => true, 'message' => 'Jadwal Dokter berhasil dihapus']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
