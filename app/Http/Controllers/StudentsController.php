<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Score;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('find')){
            $students = Student::where('nama','LIKE','%'.$request->find.'%')->get();
        }else{
            $students = \App\Models\Student::all();
        }
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'universitas' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'telp' => 'required',
        ]);

        Student::create($request->all());
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $students = \App\Models\Student::find($student);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
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
              return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Dihapus!');
    }

    public function profile(Student $student)
    {
        $semester[] = null;
        $nilai[] = null;
        foreach($student->scores as $scr){
            $semester[] = $scr->semester;
            $nilai[] = $scr->nilai;
        }

        return view('students.profile', compact('student','semester','nilai'));

    }
}
