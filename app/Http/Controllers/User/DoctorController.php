<?php

namespace App\Http\Controllers\User;

use App\Models\Doctor;
use App\Models\FieldDoctor;
use App\Models\RunningText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        $query = Doctor::with('field_doctor');

        if ($request->filled('field') && $request->field != 'Pilih Spesialis Dokter') {
            $query->where('field_id', $request->input('field'));
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $fields = FieldDoctor::all(); // Assuming you have a Field model for the specializations
        $running_text = RunningText::first();
        $doctors = $query->orderBy('name', 'asc')->paginate(8);
        // return $doctors;
        return view('user.doctor.index', compact('running_text', 'doctors', 'fields'));
    }

    public function show(string $id)
    {
        $doctor = Doctor::with('field_doctor', 'schedule_doctor')->findOrFail($id);
        $running_text = RunningText::first();
        $otherDoctor = Doctor::with('field_doctor')
                            ->where('id', '!=', $id)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        return view('user.doctor.show', compact('doctor', 'running_text', 'otherDoctor'));
    }

}
