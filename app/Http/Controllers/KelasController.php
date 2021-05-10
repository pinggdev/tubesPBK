<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Kelas $kelas)
    {
        $q = $request->input('q');


        $kelas = $kelas->when($q, function($query) use ($q) {
            return $query->where('kelas', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.kelas.index', [
            'kelas'     => $kelas,
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
        return view('dashboard.kelas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kelas $kelas)
    {   
        $validator = Validator::make($request->all(), [
            'kelas'     => 'required|unique:App\Kelas,kelas',
            'bab'       => 'required',
            'gambar'    => 'required|image',
            'deskripsi' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kelas.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/kelas', $image, $filename);
    
            $kelas->kelas = $request->input('kelas');
            $kelas->deskripsi = $request->input('deskripsi');
            $kelas->bab = $request->input('bab');
            $kelas->gambar = $filename;
            $kelas->slug = Str::slug($request->kelas);
            $kelas->save();
            return redirect()->route('kelas.index');
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
        $kelas = Kelas::find($id);
        return view('dashboard.kelas.edit', [
            'kelas'     => $kelas,
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
        $kelas = Kelas::find($id);
        $validator = Validator::make($request->all(), [
            'kelas'     => 'required|unique:App\Kelas,kelas,'.$kelas->id,
            'gambar'    => 'image',
            'deskripsi' => 'required',
            'bab'       => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('kelas.edit', $kelas->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            if($request->has('gambar')) {
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/kelas', $image, $filename);

                $kelas_data = [
                    'kelas'     => $request->kelas,
                    'gambar'    => $filename,
                    'deskripsi' => $request->deskripsi,
                    'bab'       => $request->bab,
                    'slug'      => Str::slug($request->kelas)
                ];
            } else {
                $kelas_data = [
                    'kelas'     => $request->kelas,
                    // 'gambar'    => Storage::disk('local')->putFileAs('public/kelas', $image, $filename),
                    'deskripsi' => $request->deskripsi,
                    'bab'       => $request->bab,
                    'slug'      => Str::slug($request->kelas)
                ];
            }
            $kelas->update($kelas_data);
        }
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()
                ->route('kelas.index');
    }
}
