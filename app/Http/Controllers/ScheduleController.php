<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\AttendanceStudent;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('schedules.argon-create',['attendance_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jadwal' => 'required',
            'attendance_id' => 'required'
        ],[
            'jadwal.required' => 'Jadwal harus diisi'
        ]);
        $schedule = Schedule::create($data);
        foreach (AttendanceStudent::where('attendance_id', $request->attendance_id)->get() as $item) {
            Presence::create([
                'schedule_id' => $schedule->id,
                'attendance_student_id' => $item->id,
                'status'    => 0
            ]);
        }
        return redirect('/attendances/'. $request->attendance_id)->with('status', 'Jadwal Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.argon-detail',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->back()->with('status', 'Jadwal Berhasil Dihapus!');
    }
}
