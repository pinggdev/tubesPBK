<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Submission;
use App\HasilSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HasilSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request ,HasilSubmission $hasil_submission)
    {
        $q = $request->input('q');


        $hasil_submission = $hasil_submission->when($q, function($query) use ($q) {
            return $query->where('soal', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.hasilSubmission.index', [
            'hasil_submission'     => $hasil_submission,
            'request'              => $request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas, $babsubmission)
    {
        $data = Submission::where('babsubmission', $babsubmission)->orWhere('kelas_id', $kelas)->get();
        $submission = Submission::all();
        // $kuis = Kuis::all();
        $hasil_submission = HasilSubmission::all();
        return view('dashboard.hasilSubmission.form', [
            'hasil_submission'  => $hasil_submission,
            'kelas'             => $kelas,
            'submission'        => $submission,
            'data'              => $data,
            // 'kuis'           => $kuis,
            ]);
        // $kelas = Kelas::all();

        // $hasil_submission = HasilSubmission::all();
        // return view('dashboard.hasilSubmission.form', [
        //     'hasil_submission'    => $hasil_submission,

        //     'kelas'               => $kelas
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HasilSubmission $hasil_submission)
    {
        $submission = Submission::all();
        $validator = Validator::make($request->all(), [
            'file'       => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('hasilsubmission.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // dd($request);
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/hasil', $file, $filename);
            // $request->request->add(['submission_id' => $request->submission_id]);
            // $request->request->add(['user_id' => auth()->user()->id]);
            // $request->request->add(['filename' => $filename]);
            // $hasil_submission->file = $filename;

            $hasil_submission->submission_id = $request->input('submission_id');
            $hasil_submission->user_id = auth()->user()->id;
            $hasil_submission->file = $filename;

            $hasil_submission->save();
            // $hasil_submission = HasilSubmission::create($request->all());



            return redirect()->back();
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
    public function edit($id)
    {
        $hasil_submission = HasilSubmission::find($id);
        return view('dashboard.hasilSubmission.edit', [
            'hasil_submission'      => $hasil_submission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasil_submission = HasilSubmission::find($id);
        $validator = Validator::make($request->all(), [
            'lanjut'       => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('hasilsubmission.edit', $hasil_submission->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // dd($request);
            // $file = $request->file('file');
            // $filename = time() . '.' . $file->getClientOriginalExtension();
            // Storage::disk('local')->putFileAs('public/hasil', $file, $filename);

            // $hasil_submission->submission_id = $request->input('submission_id');
            // $hasil_submission->user_id = auth()->user()->id;
            // $hasil_submission->file = $filename;
            $hasil_submission->lanjut = $request->input('lanjut');

            $hasil_submission->save();
            // $hasil_submission = HasilSubmission::create($request->all());



            return redirect()->route('hasilsubmission.index');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
