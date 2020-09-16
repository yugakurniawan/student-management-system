<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectsController extends Controller
{

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'tahun'     => ['required','numeric','min:2010','max:2100'],
            'kegiatan'  => ['required'],
            'tugas'     => ['required'],
            'nilai'     => ['required'],
        ]);

        // dd($request->all());

        $data['student_id'] = $id;

        Project::create($data);

        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    public function show(Project $project)
    {
        return response()->json([
            'success'   => true,
            'data'      => $project
        ]);
    }


    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'tahun'     => ['required','numeric','min:2010','max:2100'],
            'kegiatan'  => ['required'],
            'tugas'     => ['required'],
            'nilai'     => ['required'],
        ]);

        $project->update($data);

        return redirect()->back()->with('status', 'Berhasil Memperbarui Data');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('status', 'Nilai Mahasiswa Berhasil Dihapus!');
    }
}
