<?php

namespace App\Http\Controllers;

use App\Kuis;
use App\Kelas;
use App\JawabanKuis;
use App\KuisPilihan;
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
            return $query->where('pertanyaan', 'like', '%' .$q. '%');
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
            'pertanyaan'        => 'required|unique:App\Kuis,pertanyaan',
            'kelas_id'          => 'required',
            'babkuis'           => 'required',
            'pilihan_a'         => 'required',
            'pilihan_b'         => 'required',
            'pilihan_c'         => 'required',
            'jawaban_benar'     => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kuis.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // insert ke table kuis
            $kuis = new Kuis;
            $kuis->pertanyaan = $request->input('pertanyaan');
            $kuis->kelas_id = $request->input('kelas_id');
            $kuis->babkuis = $request->input('babkuis');
            $kuis->save();

            //insert ke table pilihan
            $request->request->add(['kuis_id' => $kuis->id]);
            $kuis_pilihan = KuisPilihan::create($request->all());
            $kuis_pilihan->pilihan_a = $request->input('pilihan_a');
            $kuis_pilihan->pilihan_b = $request->input('pilihan_b');
            $kuis_pilihan->pilihan_c = $request->input('pilihan_c');
            $kuis_pilihan->save();

            //insert ke table jawaban_kuis
            $jawaban_kuis = JawabanKuis::create($request->all());
            $jawaban_kuis->jawaban_benar = $request->input('jawaban_benar');
            $jawaban_kuis->save();

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
        $kuis_pilihan = KuisPilihan::find($id);
        $jawaban_kuis = JawabanKuis::find($id);
        $validator = Validator::make($request->all(), [
            'pertanyaan'        => 'required|unique:App\Kuis,pertanyaan,'.$kuis->id,
            'kelas_id'          => 'required',
            'babkuis'           => 'required',
            'pilihan_a'         => 'required',
            'pilihan_b'         => 'required',
            'pilihan_c'         => 'required',
            'jawaban_benar'     => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kuis.edit', $kuis->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // insert ke table kuis
            // $kuis = new Kuis;
            $kuis->pertanyaan = $request->input('pertanyaan');
            $kuis->kelas_id = $request->input('kelas_id');
            $kuis->babkuis = $request->input('babkuis');
            $kuis->save();

            //insert ke table pilihan
            // $request->request->add(['kuis_id' => $kuis->id]);
            // $kuis_pilihan = KuisPilihan::update($request->all());
            $kuis_pilihan->pilihan_a = $request->input('pilihan_a');
            $kuis_pilihan->pilihan_b = $request->input('pilihan_b');
            $kuis_pilihan->pilihan_c = $request->input('pilihan_c');
            $kuis_pilihan->save();

            //insert ke table jawaban_kuis
            // $jawaban_kuis = JawabanKuis::update($request->all());
            $jawaban_kuis->jawaban_benar = $request->input('jawaban_benar');
            $jawaban_kuis->save();

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
        $kuis_pilihan = KuisPilihan::find($id);
        $jawaban_kuis = JawabanKuis::find($id);
        $kuis->delete();
        $kuis_pilihan->delete();
        $jawaban_kuis->delete();
        return redirect()->route('kuis.index');
    }
}
