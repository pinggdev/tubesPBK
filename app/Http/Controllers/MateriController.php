<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Materi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Materi $materi, Kelas $kelas)
    {
        $q = $request->input('q');


        $materi = $materi->when($q, function($query) use ($q) {
            return $query->where('materi', 'like', '%' .$q. '%');
        })
        ->paginate(10);
        
        $request = $request->all();

        return view('dashboard.materi.index', [
            'materi'     => $materi,
            'request'   => $request,
            'kelas'     => $kelas
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas)
    {
        $kelas = Kelas::all();
        return view('dashboard.materi.form', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Materi $materi)
    {
        $validator = Validator::make($request->all(), [
            'materi'     => 'required|unique:App\Materi,materi',
            'kelas_id'    => 'required',
            'link' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('materi.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $materi->materi = $request->input('materi');
            $materi->kelas_id = $request->input('kelas_id');
            $materi->link = $request->input('link');
            $materi->slug = Str::slug($request->materi);
            $materi->save();
            return redirect()->route('materi.index');
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
        $kelas = Kelas::all();
        $materi = Materi::find($id);
        return view('dashboard.materi.edit', [
            'materi'     => $materi,
            'kelas'      => $kelas
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
        $materi = Materi::find($id);
        $validator = Validator::make($request->all(), [
            'materi'     => 'required|unique:App\Materi,materi,'.$materi->id,
            'kelas_id'   => 'required',
            'link'       => 'required'
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('materi.edit', $materi->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $materi->materi = $request->input('materi');
            $materi->kelas_id = $request->input('kelas_id');
            $materi->link = $request->input('link');
            $materi->slug = Str::slug($request->materi);
            $materi->save();
            return redirect()->route('materi.index');
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
        $materi = Materi::find($id);
        $materi->delete();
        return redirect()
                ->route('materi.index');
    }
}
