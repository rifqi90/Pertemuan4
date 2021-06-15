<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Import\KamarImport;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        $kamar = Kamar::when($request->cari, function ($query) use ($request) {
            $query
            ->where('id_pasien', 'like', "%{$request->cari}%");
        })->paginate(5);

        $kamar->appends($request->only('cari'));

        return view('kamar.index', [
            'kamar' => $kamar,
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
        return view('kamar.create');
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
            'id_pasien'        => 'required',
            'id_dokter' => 'required',
        ]);

        Kamar::create($request->all());

        return redirect()
                ->route('kamar.index')
                ->with('success','kamar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'id_pasien'        => 'required',
            'id_dokter' => 'required',
        ]);

        $kamar->update($request->all());

        return redirect()
                ->route('kamar.index')
                ->with('success','kamar updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('kamar.index')
                ->with('success','Kamar deleted successfully');
    }
}