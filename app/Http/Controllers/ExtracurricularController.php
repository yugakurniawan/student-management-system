<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        Extracurricular::create($data);

        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show(Extracurricular $extracurricular)
    {
        return response()->json([
            'success'   => true,
            'data'      => $extracurricular
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        $data = $request->validate([
            'tahun'     => ['required','numeric','min:2010','max:2100'],
            'kegiatan'  => ['required'],
            'tugas'     => ['required'],
            'nilai'     => ['required'],
        ]);

        $extracurricular->update($data);

        return redirect()->back()->with('status', 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extracurricular $extracurricular)
    {
        $extracurricular->delete();
        return redirect()->back()->with('status', 'Nilai Mahasiswa Berhasil Dihapus!');
    }
}
