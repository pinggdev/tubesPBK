<?php

namespace App\Http\Controllers;

use App\User;
use App\Result;
use Illuminate\Http\Request;

class HasilKuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Result $result)
    {
        $q = $request->input('q');


        $result = $result->when($q, function($query) use ($q) {
            return $query->where('user_id', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();
        $user = User::all();
        return view('dashboard.hasil.index', [
            'result'      => $result,
            'request'   => $request,
            'user'   => $user,
            ]);
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
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::find($id);
        $result->delete();
        return redirect()
                ->route('hasil.index');
    }
}
