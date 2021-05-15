<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Kuis $kuis)
    {
        $q = $request->input('q');


        $kuis = $kuis->when($q, function($query) use ($q) {
            return $query->where('soal', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.kuis.index', [
            'kuis'      => $kuis,
            'request'   => $request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kuis $kuis)
    {
        $kelas = Kelas::all();
        return view('dashboard.kuis.form', [
            'kuis'     => $kuis,
            'kelas'    => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas_id'          => 'required',
            'soal'        => 'required|unique:App\Kuis,soal',
            'babkuis'           => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kuis.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // insert ke table kuis
            $kuis = Kuis::create($request->all());

            return redirect()->route('kuis.index');
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
        $kuis = Kuis::find($id);
        $kelas = Kelas::all();
        return view('dashboard.kuis.edit', [
            'kuis'          => $kuis,
            'kelas'         => $kelas,
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
        $kuis = Kuis::find($id);
        $validator = Validator::make($request->all(), [
            'kelas_id'          => 'required',
            'soal'        => 'required|unique:App\Kuis,soal,'.$kuis->id,
            'babkuis'           => 'required',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kuis.edit', $kuis->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $kuis->update($request->all());

            return redirect()->route('kuis.index');
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
        $kuis = Kuis::find($id);
        $kuis->delete();
        return redirect()->route('kuis.index');
    }
}
