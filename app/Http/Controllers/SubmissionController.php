<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Submission $submission)
    {
        $q = $request->input('q');


        $submission = $submission->when($q, function($query) use ($q) {
            return $query->where('soal', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.submission.index', [
            'submission'     => $submission,
            'request'   => $request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('dashboard.submission.form', [
            'kelas'    => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Submission $submission)
    {
        $validator = Validator::make($request->all(), [
            'kelas_id'          => 'required',
            'babsubmission'     => 'required',
            'soal'              => 'required|unique:App\Submission,soal',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('submission.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $submission = Submission::create($request->all());
            return redirect()->route('submission.index');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        $kelas = Kelas::all();
        return view('dashboard.submission.edit', [
            'submission'    => $submission,
            'kelas'         => $kelas
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        $validator = Validator::make($request->all(), [
            'kelas_id'          => 'required',
            'babsubmission'     => 'required',
            'soal'              => 'required|unique:App\Submission,soal,'.$submission->id,
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('submission.edit', $submission->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $submission->update($request->all());
            return redirect()->route('submission.index');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()
                ->route('submission.index');
    }
}
