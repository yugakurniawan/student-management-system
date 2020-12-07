<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use PDF;

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

        // dd($students);
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
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'status_ortu' => 'required',
        ]);

        Student::where('id', $student->id)
          ->update([
              'nisn' => $request->nisn,
              'nama' => $request->nama,
              'jenis_kelamin' => $request->jenis_kelamin,
              'tempat_lahir' => $request->tempat_lahir,
              'tgl_lahir' => $request->tgl_lahir,
              'agama' => $request->agama,
              'alamat' => $request->alamat,
              'email' => $request->email,
              'telp' => $request->telp,
              'ayah' => $request->ayah,
              'pekerjaan_ayah' => $request->pekerjaan_ayah,
              'ibu' => $request->ibu,
              'pekerjaan_ibu' => $request->pekerjaan_ibu,
              'status_ortu' => $request->status_ortu,
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

    public function profile(Request $request, Student $student)
    {

        $subject = Subject::all();

        $categories = [];
        $data = [];
        foreach ($subject as $mapel) {
            if ($student->subject()->wherePivot('subject_id', $mapel->id)->first()) {
                $categories[] = $mapel->nama;
                $data[] = $student->subject()->wherePivot('subject_id', $mapel->id)->first()->pivot->nilai;
            }
        }
        // dd($data);

        return view('students.argon-profile', compact('student', 'subject', 'categories', 'data'));
    }

    public function tambahnilai(Request $request, Student $student)
    {
        if ($student->subject()->where('subject_id', $request->subject)->exists()) {
            return redirect()->back()->with('error', 'Data Pelajaran Sudah Ada');
        }

        $student->subject()->attach($request->subject, ['nilai' => $request->nilai]);

        return redirect()->back()->with('status', 'Nilai Berhasil Ditambahkan!');

    }

        public function editnilai(Request $request, Student $student)
        {

            $students = \App\Models\Student::find($student);
            $subject = Subject::all();
            return view('students.edit-nilai', compact('student', 'subject'));

        }

        public function updatenilai(Request $request, Student $student)
        {

            $request->validate([
                        'mata_pelajaran' => 'required',
                        'nilai' => 'required',
                    ]);

            Student::where('id', $student->id)
                      ->update([
                          'mata_pelajaran' => $request->mata_pelajaran,
                          'nilai' => $request->nilai
                      ]);

                    return redirect()->back()->with('status', 'Nilai Mahasiswa Berhasil Diperbarui!');

        }

        public function destroynilai(Student $student, Subject $subject)
        {
            $students = Student::find($student->id);
            $students->subject()->detach($subject->id);
            return redirect()->back()->with('status', 'Nilai Berhasil Dihapus!');
        }

        public function cetak2(Student $student)
    {

        $subject = Subject::all();

        $categories = [];
        $data = [];
        foreach ($subject as $mapel) {
            if ($student->subject()->wherePivot('subject_id', $mapel->id)->first()) {
                $categories[] = $mapel->nama;
                $data[] = $student->subject()->wherePivot('subject_id', $mapel->id)->first()->pivot->nilai;
            }
        }

        $tanggal = Carbon::now()->isoFormat(' D MMMM Y');
        $tanggal2 = Carbon::now()->isoFormat('Y');
        // dd($data);

        return view('students.cetak2', compact('student', 'subject', 'categories', 'data', 'tanggal', 'tanggal2'));

        // foreach($student->subject as $ss){
        //     $mapel = $ss->nama;
        //     $nilai = $ss->pivot->nilai;
        // }

        // $tanggal = Carbon::now()->isoFormat(' D MMMM Y');

        // return view('students.cetak2', compact('student','mapel','nilai','tanggal'));
    }

        public function exportExcel()
        {
            return Excel::download(new StudentsExport, 'datasiswa.xlsx');
        }

        public function exportPDF(Student $student)
        {
            $students = Student::all();
            $pdf = PDF::loadView('Exports.exportpdf', compact('students'))->setPaper('a3', 'landscape');
            // dd($students);
            return $pdf->download('datasiswa.pdf');
        }

}
