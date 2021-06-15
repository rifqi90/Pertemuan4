<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Import\DokterImport;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $dokter = Dokter::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', 'like', "%{$request->cari}%");
        })->paginate(5);

        $dokter->appends($request->only('cari'));

        return view('dokter.index', [
            'dokter' => $dokter,
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
        return view('dokter.create');
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
            'jabatan' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect()
                ->route('dokter.index')
                ->with('success','dokter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama'        => 'required',
            'jabatan' => 'required',
        ]);

        $dokter->update($request->all());

        return redirect()
                ->route('dokter.index')
                ->with('success','dokter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokter.index')
                ->with('success','Dokter deleted successfully');
    }
}