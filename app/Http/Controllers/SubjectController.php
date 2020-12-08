<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject)
    {

        $subjects = Subject::all();


        // dd($subjects);
        return view('subjects.argon-index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.argon-create', ['teachers'=> Teacher::all()]);
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
            'kode' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'teacher_id' => 'required',
        ],[
            'teacher_id.required' => 'Guru Mata Pelajaran harus diisi'
        ]);
        Subject::create([   'kode' => $request->kode,
                            'nama' => $request->nama,
                            'semester' => $request->semester,
                            'teacher_id' => $request->teacher_id
                        ]);
        // foreach($request->teacher_id as $teacher){
        //     Teacher::create([
        //         'teacher_id' => $teacher
        //     ]);
        // }
        return redirect('/subjects')->with('status', 'Mata Pelajaran Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        Subject::destroy($subject->id);
        return redirect('/subjects')->with('status', 'Mata Pelajaran Berhasil Dihapus!');
    }
}
