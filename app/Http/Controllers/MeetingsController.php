<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\MeetingStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();
        return view('meetings.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meetings.create',['students'=> Student::all()]);
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
            'student_id.required' => 'Peserta meeting harus diisi'
        ]);
        $meeting = Meeting::create(['nama' => $request->nama]);
        foreach($request->student_id as $student){
            MeetingStudent::create([
                'meeting_id' => $meeting->id,
                'student_id' => $student
            ]);
        }
        return redirect('/meetings')->with('status', 'Meeting Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return view('meetings.detail', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        $meetings = \App\Models\Student::find($student);
        return view('meetings.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'nama' => 'required',
            'universitas' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'telp' => 'required'
        ]);

        Student::where('id', $student->id)
          ->update([
              'nama' => $request->nama,
              'universitas' => $request->universitas,
              'angkatan' => $request->angkatan,
              'fakultas' => $request->fakultas,
              'jurusan' => $request->jurusan,
              'prodi' => $request->prodi,
              'angkatan' => $request->angkatan,
              'telp' => $request->telp,
              'avatar' => $request->avatar
              ]);

              if($request->hasFile('avatar')){
                  $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
                  $student->avatar = $request->file('avatar')->getClientOriginalName();
                  $student->save();
              }
              return redirect('/meetings')->with('status', 'Data Mahasiswa Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        Meeting::destroy($meeting->id);
        return redirect('/meetings')->with('status', 'Meeting Berhasil Dihapus!');
    }
}
