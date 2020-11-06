<?php

namespace App\Http\Controllers;

use App\Models\MeetingStudent;
use App\Models\Student;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Str;
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
        return view('students.argon-index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.argon-create');
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
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $user = new User;
        $user->role = 'student';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->remember_token = Str::random(10);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $student = Student::create($request->all());
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
        return view('students.argon-edit', compact('student'));
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
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        Student::where('id', $student->id)
          ->update([
              'nisn' => $request->nama,
              'nama' => $request->nama,
              'jenis_kelamin' => $request->jenis_kelamin,
              'agama' => $request->agama,
              'tempat_lahir' => $request->tempat_lahir,
              'tgl_lahir' => $request->tgl_lahir,
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

        // foreach($student->meeting_student as $meeting_student) {
        //     $hadir = 0;
        //     foreach($meeting_student->kehadiran as $kehadiran){
        //         if ($kehadiran->status == 1) {
        //             $hadir++;
        //         }
        //     };
        //     dd($hadir);
        // };

        return view('students.argon-profile', compact('student','semester','nilai'));

    }

    public function cetak1(Student $student)
    {
        return view('students.cetak1', compact('student'));
    }

    public function cetak2(Student $student)
    {
        $semester[] = null;
        $nilai[] = null;
        foreach($student->scores as $scr){
            $semester[] = $scr->semester;
            $nilai[] = $scr->nilai;
        }

        return view('students.cetak2', compact('student','semester','nilai'));
    }

    public function detail_kehadiran(MeetingStudent $meeting_student) {
        return view('students.argon-detail-kehadiran', compact('meeting_student'));
    }
}
