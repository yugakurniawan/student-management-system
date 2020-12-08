<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.argon-index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendances.argon-create',['students'=> Student::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'student_id' => 'required',
        ],[
            'student_id.required' => 'Peserta Kehadiran harus diisi'
        ]);
        $attendance = Attendance::create(['nama' => $request->nama]);
        foreach($request->student_id as $student){
            AttendanceStudent::create([
                'attendance_id' => $attendance->id,
                'student_id' => $student
            ]);
        }
        return redirect('/attendances')->with('status', 'Kehadiran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        return view('attendances.argon-detail', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        return view('attendances.argon-edit',['students'=> Student::all()], compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'nama' => 'required',
            'student_id' => 'required',
        ],[
            'student_id.required' => 'Peserta Kehadiran harus diisi'
        ]);
        $attendance->update(['nama' => $request->nama]);
        AttendanceStudent::where('attendance_id', $attendance->id)->delete();
        foreach($request->student_id as $student){
            AttendanceStudent::create([
                'attendance_id' => $attendance->id,
                'student_id' => $student
            ]);
        }

        // dd($Kehadiran->students);
        return redirect('/attendances')->with('status', 'Kehadiran Berhasil Perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        Attendance::destroy($attendance->id);
        return redirect('/attendances')->with('status', 'Kehadiran Berhasil Dihapus!');
    }
}
