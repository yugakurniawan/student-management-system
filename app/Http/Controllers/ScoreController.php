<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ScoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'semester'  => ['required','numeric','min:1','max:14','unique:scores,semester'],
            'nilai'     => ['required','numeric','min:0','max:4']
        ]);

        $data['student_id'] = $id;

        Score::create($data);

        return redirect()->back()->with('status', 'Berhasil Menambahkan Data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $data = $request->validate([
            'semester'  => ['required','numeric','min:1','max:14', Rule::unique('scores','semester')->ignore($score)],
            'nilai'     => ['required','numeric','min:0','max:4']
        ]);

        $score->update($data);

        return redirect()->back()->with('status', 'Berhasil Memperbarui Data');
    }

    public function show(Score $score)
    {
        return response()->json([
            'success'   => true,
            'data'      => $score
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->back()->with('status', 'Nilai Mahasiswa Berhasil Dihapus!');
    }
}
