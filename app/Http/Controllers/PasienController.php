<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Import\PasienImport;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pasien::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', 'like', "%{$request->cari}%");
        })->paginate(5);

        $pasien->appends($request->only('cari'));

        return view('pasien.index', [
            'pasien' => $pasien,
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
        return view('pasien.create');
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
            'alamat' => 'required',
        ]);

        Pasien::create($request->all());

        return redirect()
                ->route('pasien.index')
                ->with('success','pasien created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama'        => 'required',
            'alamat' => 'required',
        ]);

        $pasien->update($request->all());

        return redirect()
                ->route('pasien.index')
                ->with('success','pasien updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')
                ->with('success','Pasien deleted successfully');
    }
}