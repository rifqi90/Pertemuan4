<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Import\UserImport;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', 'like', "%{$request->cari}%");
        })->paginate(5);

        $user->appends($request->only('cari'));

        return view('user.index', [
            'user' => $user,
        ])
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'username'  => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()
                ->route('user.index')
                ->with('success','user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama'        => 'required',
            'username'  => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

        return redirect()
                ->route('user.index')
                ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
                ->with('success','User deleted successfully');
    }
}