<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $q = $request->input('q');


        $user = $user->when($q, function($query) use ($q) {
            return $query->where('name', 'like', '%' .$q. '%');
        })
        ->paginate(10);

        $request = $request->all();

        return view('dashboard.user.index', [
            'user'     => $user,
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
        return view('dashboard.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'role'      => 'required',
            'email'     => 'required|unique:App\User,email',
            'avatar'    => 'required|image',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('user.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/user', $image, $filename);

            if($request->input('password')) {
                $password = Hash::make($request->password);
            } else {
                $password = Hash::make('rahasia');
            }
    
            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $user->avatar = $filename;
            $user->password = $password;
            $user->save();
            return redirect()->route('user.index');
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
        $user = User::find($id);
        return view('dashboard.user.edit', [
            'user'     => $user,
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
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'role'      => 'required',
            'email'     => 'required|unique:App\User,email,'.$user->id,
            'avatar'    => 'image',
        ]);

        if($validator->fails()) {
            return redirect()
                    ->route('user.edit', $user->id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            if($request->has('avatar') && $request->input('password')) {
                $password = Hash::make($request->password);
                $image = $request->file('avatar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/user', $image, $filename);

                $user_data = [
                    'name'      => $request->name,
                    'role'      => $request->role,
                    'email'     => $request->email,
                    'password'  => $password,
                    'avatar'    => $filename,
                ];

            } else if ($request->has('avatar')) {
                $image = $request->file('avatar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/user', $image, $filename);

                $user_data = [
                    'name'      => $request->name,
                    'role'      => $request->role,
                    'email'     => $request->email,
                    'avatar'    => $filename,
                ];
            } else if ($request->input('password')) {
                $password = Hash::make($request->password);

                $user_data = [
                    'name'      => $request->name,
                    'role'      => $request->role,
                    'email'     => $request->email,
                    'password'  => $password,
                ];
            }
            else {
                $user_data = [
                    'name'      => $request->name,
                    'role'      => $request->role,
                    'email'     => $request->email,
                ];
            }
            $user->update($user_data);
            return redirect()->route('user.index');
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
        $user = User::find($id);
        $filename = $user->avatar;
        File::delete('storage/user/'.$filename);
        $user->delete();
        return redirect()
                ->route('user.index');
    }
}
